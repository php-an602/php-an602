<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 H u m H u b GmbH & Co. KG, PHP-AN602, The 86it Developers Network, and Yii
 * @license https://www.metamz.network/licences
 */

namespace an602\components;

use Yii;
use yii\helpers\Url;
use yii\base\Exception;

/**
 * @inheritdoc
 */
class Application extends \yii\web\Application
{

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'an602\\controllers';

    /**
     * @var string|array the homepage url
     */
    private $_homeUrl = null;

    /**
     * @var string Minimum PHP version that recommended to work without issues
     */
    public $minRecommendedPhpVersion;

    /**
     * @var string Minimum PHP version that may works but probably with small issues
     */
    public $minSupportedPhpVersion;

    /**
     * @inheritdoc
     */
    public function __construct($config = [])
    {
        // Remove obsolete config params:
        unset($config['components']['formatterApp']);

        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        if (version_compare(phpversion(), $this->minSupportedPhpVersion, '<')) {
            throw new \Exception(sprintf(
                'Installed PHP Version is too old! Required minimum version is PHP %s (Installed: %s)',
                $this->minSupportedPhpVersion,
                phpversion()
            ));
        }

        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function bootstrap()
    {
        $request = $this->getRequest();

        if (Yii::getAlias('@web-static', false) === false) {
            Yii::setAlias('@web-static', $request->getBaseUrl() . '/static');
        }

        if (Yii::getAlias('@webroot-static', false) === false) {
            Yii::setAlias('@webroot-static', '@webroot/static');
        }

        parent::bootstrap();
    }

    /**
     * @return string the homepage URL
     */
    public function getHomeUrl()
    {
        if ($this->_homeUrl === null) {
            return Url::to(['/dashboard/dashboard']);
        } elseif (is_array($this->_homeUrl)) {
            return Url::to($this->_homeUrl);
        } else {
            return $this->_homeUrl;
        }
    }

    /**
     * @param string|array $value the homepage URL
     */
    public function setHomeUrl($value)
    {
        $this->_homeUrl = $value;
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        /**
         * Check if it's already installed - if not force controller module
         */
        if (!$this->params['installed'] && $this->controller->module != null && $this->controller->module->id != 'installer') {
            $this->controller->redirect(['/installer/index']);
            return false;
        }

        /**
         * More random widget autoId prefix
         * Ensures to be unique also on ajax partials
         */
        \yii\base\Widget::$autoIdPrefix = 'h' . mt_rand(1, 999999) . 'w';

        return parent::beforeAction($action);
    }

    /**
     * Switch current language
     *
     * @param string $value
     */
    public function setLanguage($value)
    {
        if (!empty($value)) {
            $this->language = $value;
        }
    }
}
