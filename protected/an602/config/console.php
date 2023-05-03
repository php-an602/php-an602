<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

return [
    'id' => 'an602-console',
    'controllerNamespace' => 'an602\commands',
    'components' => [
        'user' => [
            'class' => \an602\modules\user\components\User::class,
            'identityClass' => \an602\modules\user\models\User::class,
            'enableAutoLogin' => false,
            'enableSession' => false,
            'loginUrl' => ['/user/auth/login']
        ],
    ],
];
