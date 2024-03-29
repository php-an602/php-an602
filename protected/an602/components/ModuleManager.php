<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 H u m H u b GmbH & Co. KG, PHP-AN602, The 86it Developers Network, and Yii
 * @license https://www.metamz.network/licences
 */

namespace an602\components;

use an602\components\bootstrap\ModuleAutoLoader;
use an602\components\console\Application as ConsoleApplication;
use an602\libs\BaseSettingsManager;
use an602\models\ModuleEnabled;
use an602\modules\admin\events\ModulesEvent;
use an602\modules\marketplace\Module as ModuleMarketplace;
use Yii;
use yii\base\Component;
use yii\base\Event;
use yii\base\Exception;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;

/**
 * ModuleManager handles all installed modules.
 *
 * @author luke
 */
class ModuleManager extends Component
{
    /**
     * @event triggered before a module is enabled
     * @since 1.3
     */
    public const EVENT_BEFORE_MODULE_ENABLE = 'beforeModuleEnabled';

    /**
     * @event triggered after a module is enabled
     * @since 1.3
     */
    public const EVENT_AFTER_MODULE_ENABLE = 'afterModuleEnabled';

    /**
     * @event triggered before a module is disabled
     * @since 1.3
     */
    public const EVENT_BEFORE_MODULE_DISABLE = 'beforeModuleDisabled';

    /**
     * @event triggered after a module is disabled
     * @since 1.3
     */
    public const EVENT_AFTER_MODULE_DISABLE = 'afterModuleDisabled';

    /**
     * @event triggered after filter modules
     * @since 1.11
     */
    public const EVENT_AFTER_FILTER_MODULES = 'afterFilterModules';

    /**
     * Create a backup on module folder deletion
     *
     * @var boolean
     */
    public bool $createBackup = true;

    /**
     * List of all modules
     * This also contains installed but not enabled modules.
     *
     * @param array $modules moduleId-class pairs
     */
    protected array $modules = [];

    /**
     * List of all enabled module ids
     *
     * @var array
     */
    protected array $enabledModules = [];

    /**
     * List of core module classes.
     *
     * @var array the core module class names
     */
    protected array $coreModules = [];

    /**
     * @var bool Prevent registration of several different modules with the same id.
     */
    public bool $preventDuplicatedModules = true;

    /**
     * List of module paths that should be overwritten
     * Key - module id, Value - absolute path to module folder
     *
     * @var array
     */
    public array $overwriteModuleBasePath = [];

    /**
     * Module Manager init
     *
     * Loads all enabled moduleId's from database
     */
    public function init()
    {
        parent::init();

        // Either database installed and not in installed state
        if (!Yii::$app->params['databaseInstalled'] && !Yii::$app->params['installed']) {
            return;
        }

        if (!BaseSettingsManager::isDatabaseInstalled()) {
            $this->enabledModules = [];
        } else {
            $this->enabledModules = ModuleEnabled::getEnabledIds();
        }
    }

    /**
     * Registers a module to the manager
     * This is usually done by config.php in modules root folder.
     * @param array $configs
     * @throws InvalidConfigException
     * @see \an602\components\bootstrap\ModuleAutoLoader::bootstrap
     *
     */
    public function registerBulk(array $configs)
    {
        foreach ($configs as $basePath => $config) {
            $this->register($basePath, $config);
        }
    }

    /**
     * Registers a module
     *
     * @param string $basePath the modules base path
     * @param array $config the module configuration (config.php)
     * @throws InvalidConfigException
     */
    public function register($basePath, $config = null)
    {
        $filename = $basePath . '/config.php';
        if ($config === null && is_file($filename)) {
            $config = include $filename;
        }

        // Check mandatory config options
        if (!isset($config['class']) || !isset($config['id'])) {
            throw new InvalidConfigException('Module configuration requires an id and class attribute: ' . $basePath);
        }

        $isCoreModule = (isset($config['isCoreModule']) && $config['isCoreModule']);
        $isInstallerModule = (isset($config['isInstallerModule']) && $config['isInstallerModule']);

        $this->modules[$config['id']] = $config['class'];

        if (isset($config['namespace'])) {
            Yii::setAlias('@' . str_replace('\\', '/', $config['namespace']), $basePath);
        }

        // Check if alias is not in use yet (e.g. don't register "web" module alias)
        if (Yii::getAlias('@' . $config['id'], false) === false) {
            Yii::setAlias('@' . $config['id'], $basePath);
        }

        if (isset($config['aliases']) && is_array($config['aliases'])) {
            foreach ($config['aliases'] as $name => $value) {
                Yii::setAlias($name, $value);
            }
        }

        if (!Yii::$app->params['installed'] && $isInstallerModule) {
            $this->enabledModules[] = $config['id'];
        }

        // Not enabled and no core/installer module
        if (!$isCoreModule && !in_array($config['id'], $this->enabledModules)) {
            return;
        }

        // Handle Submodules
        if (!isset($config['modules'])) {
            $config['modules'] = [];
        }

        if ($isCoreModule) {
            $this->coreModules[] = $config['class'];
        }

        // Append URL Rules
        if (isset($config['urlManagerRules'])) {
            Yii::$app->urlManager->addRules($config['urlManagerRules'], false);
        }

        $moduleConfig = [
            'class' => $config['class'],
            'modules' => $config['modules'],
        ];

        // Add config file values to module
        if (isset(Yii::$app->modules[$config['id']]) && is_array(Yii::$app->modules[$config['id']])) {
            $moduleConfig = ArrayHelper::merge($moduleConfig, Yii::$app->modules[$config['id']]);
        }

        // Register Yii Module
        Yii::$app->setModule($config['id'], $moduleConfig);

        // Register Event Handlers
        if (isset($config['events'])) {
            foreach ($config['events'] as $event) {
                $eventClass = $event['class'] ?? $event[0];
                $eventName = $event['event'] ?? $event[1];
                $eventHandler = $event['callback'] ?? $event[2];
                if (method_exists($eventHandler[0], $eventHandler[1])) {
                    Event::on($eventClass, $eventName, $eventHandler);
                }
            }
        }

        // Register Console ControllerMap
        if (Yii::$app instanceof ConsoleApplication && !(empty($config['consoleControllerMap']))) {
            Yii::$app->controllerMap = ArrayHelper::merge(Yii::$app->controllerMap, $config['consoleControllerMap']);
        }
    }

    /**
     * Returns all modules (also disabled modules).
     *
     * Note: Only modules which extends \an602\components\Module will be returned.
     *
     * @param array $options options (name => config)
     * The following options are available:
     *
     * - includeCoreModules: boolean, return also core modules (default: false)
     * - returnClass: boolean, return classname instead of module object (default: false)
     * - enabled: boolean, returns only enabled modules (core modules only when combined with `includeCoreModules`)
     *
     * @return array
     * @throws Exception
     */
    public function getModules($options = [])
    {
        $options = array_merge([
            'includeCoreModules' => false,
            'enabled' => false,
            'returnClass' => false,
        ], $options);

        $modules = [];
        foreach ($this->modules as $id => $class) {
            if (!$options['includeCoreModules'] && in_array($class, $this->coreModules)) {
                // Skip core modules
                continue;
            }

            if ($options['enabled'] && !in_array($class, $this->coreModules) && !in_array($id, $this->enabledModules)) {
                // Skip disabled modules
                continue;
            }

            if ($options['returnClass']) {
                $modules[$id] = $class;
            } else {
                $module = $this->getModule($id);
                if ($module instanceof Module) {
                    $modules[$id] = $module;
                }
            }
        }

        return $modules;
    }

    /**
     * Filter modules by keyword and by additional filters from module event
     *
     * @param Module[] $modules
     * @param array $filters
     * @return Module[]
     */
    public function filterModules(array $modules, $filters = []): array
    {
        $filters = array_merge([
            'keyword' => null,
        ], $filters);

        $modules = $this->filterModulesByKeyword($modules, $filters['keyword']);

        $modulesEvent = new ModulesEvent(['modules' => $modules]);
        $this->trigger(static::EVENT_AFTER_FILTER_MODULES, $modulesEvent);

        return $modulesEvent->modules;
    }

    /**
     * Filter modules by keyword
     *
     * @param Module[] $modules
     * @param null|string $keyword
     * @return Module[]
     */
    public function filterModulesByKeyword(array $modules, $keyword = null): array
    {
        if ($keyword === null) {
            $keyword = Yii::$app->request->get('keyword', '');
        }

        if (!is_scalar($keyword) || $keyword === '') {
            return $modules;
        }

        foreach ($modules as $id => $module) {
            /* @var Module $module */
            $searchFields = [$id];
            if (isset($module->name)) {
                $searchFields[] = $module->name;
            }
            if (isset($module->description)) {
                $searchFields[] = $module->description;
            }

            $keywordFound = false;
            foreach ($searchFields as $searchField) {
                if (stripos($searchField, $keyword) !== false) {
                    $keywordFound = true;
                    continue;
                }
            }

            if (!$keywordFound) {
                unset($modules[$id]);
            }
        }

        return $modules;
    }

    /**
     * Returns all enabled modules and supportes further options as [[getModules()]].
     *
     * @param array $options
     * @return array
     * @throws Exception
     * @since 1.3.10
     */
    public function getEnabledModules($options = [])
    {
        $options['enabled'] = true;
        return $this->getModules($options);
    }

    /**
     * Checks if a moduleId exists, regardless it's activated or not
     *
     * @param string $id
     * @return boolean
     */
    public function hasModule($id)
    {
        return (array_key_exists($id, $this->modules));
    }

    /**
     * Returns weather or not the given module id belongs to an core module.
     *
     * @return bool
     * @throws Exception
     * @since 1.3.8
     */
    public function isCoreModule($id)
    {
        if (!$this->hasModule($id)) {
            return false;
        }

        return (in_array(get_class($this->getModule($id)), $this->coreModules));
    }

    /**
     * Returns a module instance by id
     *
     * @param string $id Module Id
     * @return Module|object
     * @throws Exception
     * @throws InvalidConfigException
     */
    public function getModule($id)
    {
        // Enabled Module
        if (Yii::$app->hasModule($id)) {
            return Yii::$app->getModule($id, true);
        }

        // Disabled Module
        if (isset($this->modules[$id])) {
            $class = $this->modules[$id];
            return Yii::createObject($class, [$id, Yii::$app]);
        }

        throw new Exception('Could not find/load requested module: ' . $id);
    }

    /**
     * Flushes module manager cache
     */
    public function flushCache()
    {
        Yii::$app->cache->delete(ModuleAutoLoader::CACHE_ID);
    }

    /**
     * Checks the module can removed
     *
     * @param string $moduleId
     * @return bool
     * @throws Exception
     */
    public function canRemoveModule($moduleId)
    {
        $module = $this->getModule($moduleId);

        if ($module === null) {
            return false;
        }

        // Check is in dynamic/marketplace module folder
        /** @var ModuleMarketplace $marketplaceModule */
        $marketplaceModule = Yii::$app->getModule('marketplace');
        if ($marketplaceModule !== null) {
            if (strpos($module->getBasePath(), Yii::getAlias($marketplaceModule->modulesPath)) !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * Removes a module
     *
     * @param string $moduleId
     * @param bool $disableBeforeRemove
     * @throws Exception
     * @throws \yii\base\ErrorException
     */
    public function removeModule($moduleId, $disableBeforeRemove = true)
    {
        $module = $this->getModule($moduleId);

        if ($module == null) {
            throw new Exception('Could not load module to remove!');
        }

        /**
         * Disable Module
         */
        if ($disableBeforeRemove && Yii::$app->hasModule($moduleId)) {
            $module->disable();
        }

        /**
         * Remove Folder
         */
        if ($this->createBackup) {
            $moduleBackupFolder = Yii::getAlias('@runtime/module_backups');
            FileHelper::createDirectory($moduleBackupFolder);

            $backupFolderName = $moduleBackupFolder . DIRECTORY_SEPARATOR . $moduleId . '_' . time();
            $moduleBasePath = $module->getBasePath();
            FileHelper::copyDirectory($moduleBasePath, $backupFolderName);
            FileHelper::removeDirectory($moduleBasePath);
        } else {
            //TODO: Delete directory
        }

        $this->flushCache();
    }

    /**
     * Enables a module
     *
     * @param Module $module
     * @throws InvalidConfigException
     * @since 1.1
     */
    public function enable(Module $module)
    {
        $this->trigger(static::EVENT_BEFORE_MODULE_ENABLE, new ModuleEvent(['module' => $module]));

        if (!ModuleEnabled::findOne(['module_id' => $module->id])) {
            (new ModuleEnabled(['module_id' => $module->id]))->save();
        }

        $this->enabledModules[] = $module->id;
        $this->register($module->getBasePath());

        $this->trigger(static::EVENT_AFTER_MODULE_ENABLE, new ModuleEvent(['module' => $module]));
    }

    public function enableModules($modules = [])
    {
        foreach ($modules as $module) {
            $module = ($module instanceof Module) ? $module : $this->getModule($module);
            if ($module != null) {
                $module->enable();
            }
        }
    }

    /**
     * Disables a module
     *
     * @param Module $module
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     * @since 1.1
     */
    public function disable(Module $module)
    {
        $this->trigger(static::EVENT_BEFORE_MODULE_DISABLE, new ModuleEvent(['module' => $module]));

        $moduleEnabled = ModuleEnabled::findOne(['module_id' => $module->id]);
        if ($moduleEnabled != null) {
            $moduleEnabled->delete();
        }

        if (($key = array_search($module->id, $this->enabledModules)) !== false) {
            unset($this->enabledModules[$key]);
        }

        Yii::$app->setModule($module->id, null);

        $this->trigger(static::EVENT_AFTER_MODULE_DISABLE, new ModuleEvent(['module' => $module]));
    }

    /**
     * @param array $modules
     * @throws Exception
     */
    public function disableModules($modules = [])
    {
        foreach ($modules as $module) {
            $module = ($module instanceof Module) ? $module : $this->getModule($module);
            if ($module != null) {
                $module->disable();
            }
        }
    }
}
