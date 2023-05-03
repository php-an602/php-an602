<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

use an602\modules\dashboard\widgets\Sidebar;
use an602\modules\admin\Events;
use an602\commands\CronController;
use an602\modules\user\components\User;

return [
    'id' => 'admin',
    'class' => \an602\modules\admin\Module::class,
    'isCoreModule' => true,
    'events' => [
        [
            'class' => User::class,
            'event' => User::EVENT_BEFORE_SWITCH_IDENTITY,
            'callback' => [
                Events::class,
                'onSwitchUser'
            ]
        ],
        [
            'class' => Sidebar::class,
            'event' => Sidebar::EVENT_INIT,
            'callback' => [
                Events::class,
                'onDashboardSidebarInit'
            ]
        ],
        [
            'class' => CronController::class,
            'event' => CronController::EVENT_ON_DAILY_RUN,
            'callback' => [
                Events::class,
                'onCronDailyRun'
            ]
        ]
    ],
];
