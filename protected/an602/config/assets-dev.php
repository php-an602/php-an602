<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

return [
    'yii\bootstrap\BootstrapPluginAsset' => [
        'depends' => [
            'yii\web\JqueryAsset',
            'yii\bootstrap\BootstrapAsset',
            'an602\assets\JuiBootstrapBridgeAsset'
        ]
    ],
    'yii\web\JqueryAsset' => [
        'sourcePath' => '@npm/jquery/dist',
    ],
    'yii\jui\JuiAsset' => [
        'sourcePath' => '@npm/jquery-ui/dist'
    ],
];
