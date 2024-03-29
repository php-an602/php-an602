<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2015 H u m H u b GmbH & Co. KG, PHP-AN602, The 86it Developers Network, and Yii
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\installer\controllers;

use an602\commands\MigrateController;
use an602\components\access\ControllerAccess;
use an602\components\Controller;
use an602\libs\DynamicConfig;
use an602\modules\admin\widgets\PrerequisitesList;
use an602\modules\installer\forms\DatabaseForm;
use an602\modules\installer\Module;
use Yii;

/**
 * SetupController checks prerequisites and is responsible for database connection and schema setup.
 *
 * @property Module $module
 * @since 0.5
 */
class SetupController extends Controller
{
    /**
     * @inheritdoc
     */
    public $access = ControllerAccess::class;

    const PASSWORD_PLACEHOLDER = 'n0thingToSeeHere!';

    public function actionIndex()
    {
        return $this->redirect(['prerequisites']);
    }

    /**
     * Prequisites action checks application requirement using the SelfTest
     * Libary
     *
     * (Step 2)
     */
    public function actionPrerequisites()
    {
        return $this->render('prerequisites', ['hasError' => PrerequisitesList::hasError()]);
    }

    /**
     * Database action is responsible for all database related stuff.
     * Checking given database settings, writing them into a config file.
     *
     * (Step 3)
     */
    public function actionDatabase()
    {
        $errorMessage = "";

        $config = DynamicConfig::load();

        $model = new DatabaseForm();
        if (isset($config['params']['installer']['db']['installer_hostname']))
            $model->hostname = $config['params']['installer']['db']['installer_hostname'];

        if (isset($config['params']['installer']['db']['installer_database']))
            $model->database = $config['params']['installer']['db']['installer_database'];

        if (isset($config['components']['db']['username']))
            $model->username = $config['components']['db']['username'];

        if (isset($config['components']['db']['password']))
            $model->password = self::PASSWORD_PLACEHOLDER;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $connectionString = 'mysql:host=' . $model->hostname;
            if ($model->port !== '') {
                $connectionString .= ';port=' . $model->port;
            }
            if (!$model->create) {
                $connectionString .= ';dbname=' . $model->database;
            }

            $password = $model->password;
            if ($password == self::PASSWORD_PLACEHOLDER)
                $password = $config['components']['db']['password'];

            // Create Test DB Connection
            $dbConfig = [
                'class' => 'yii\db\Connection',
                'dsn' => $connectionString,
                'username' => $model->username,
                'password' => $password,
                'charset' => 'utf8',
            ];

            try {

                /** @var yii\db\Connection $temporaryConnection */
                $temporaryConnection = Yii::createObject($dbConfig);

                // Check DB Connection
                $temporaryConnection->open();

                if ($model->create) {
                    // Try to create DB
                    if (!$temporaryConnection->createCommand('SHOW DATABASES LIKE "' . $model->database . '"')->execute()) {
                        $temporaryConnection->createCommand('CREATE DATABASE `' . $model->database . '` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci')->execute();
                    }
                    $dbConfig['dsn'] .= ';dbname=' . $model->database;
                }

                // Write Config
                $config['components']['db'] = $dbConfig;
                $config['params']['installer']['db']['installer_hostname'] = $model->hostname;
                $config['params']['installer']['db']['installer_database'] = $model->database;

                DynamicConfig::save($config);

                return $this->redirect(['migrate']);

            } catch (\Exception $e) {
                $errorMessage = $e->getMessage();
            }
        }

        // Render Template
        return $this->render('database', ['model' => $model, 'errorMessage' => $errorMessage]);
    }


    public function actionMigrate()
    {
        if (!$this->module->checkDBConnection()) {
            return $this->redirect(['/installer/setup/database', 'dbFailed' => 1]);
        }

        $this->initDatabase();
        return $this->redirect(['cron']);
    }


    /**
     * Crontab
     */
    public function actionCron()
    {
        return $this->render('cron', []);
    }

    /**
     * Pretty URLs
     */
    public function actionPrettyUrls()
    {
        return $this->render('pretty-urls');
    }

    public function actionFinalize()
    {
        if (!$this->module->checkDBConnection()) {
            return $this->redirect(['/installer/setup/database', 'dbFailed' => 1]);
        }

        // Start the migration a second time here to retry any migrations aborted by timeouts.
        // In addition, in SaaS hosting, no setup step is required and only this action is executed directly.
        $this->initDatabase();

        return $this->redirect(['/installer/config']);
    }

    private function initDatabase()
    {
        // Flush Caches
        Yii::$app->cache->flush();

        // Disable max execution time to avoid timeouts during database installation
        @ini_set('max_execution_time', 0);

        // Migrate Up Database
        MigrateController::webMigrateAll();

        DynamicConfig::rewrite();

        $this->module->setDatabaseInstalled();
    }

}
