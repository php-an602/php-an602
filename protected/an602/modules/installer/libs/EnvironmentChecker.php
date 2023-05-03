<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2020 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\installer\libs;

use an602\libs\DynamicConfig;
use Yii;

/**
 * Class EnvironmentChecker
 * @package an602\modules\installer\libs
 */
class EnvironmentChecker
{

    /**
     * Performs some essential tests on Humhub installations that are not yet fully installed.
     */
    public static function preInstallChecks()
    {
        $assetsPath = Yii::getAlias(Yii::$app->assetManager->basePath);
        if (!is_writable($assetsPath)) {
            print "Error: The assets directory is not writable by the PHP process.";
            exit(1);
        }

        if (!is_writable(Yii::getAlias("@runtime"))) {
            print "Error: The runtime directory is not writable by the PHP process.";
            exit(1);
        }

        $dynamicConfigFile = DynamicConfig::getConfigFilePath();
        if (file_exists($dynamicConfigFile) && !is_writable($dynamicConfigFile)) {
            print "Error: The dynamic configuration (config/dynamic.php) is not writable by the PHP process.";
            exit(1);
        } elseif (!is_writable(dirname($dynamicConfigFile))) {
            print "Error: The dynamic configuration (config/dynamic.php) cannot be created by the PHP process.";
            exit(1);
        }
    }
}
