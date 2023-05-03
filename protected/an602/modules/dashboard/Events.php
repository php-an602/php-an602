<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\dashboard;

use an602\modules\ui\menu\MenuLink;
use an602\widgets\TopMenu;
use Yii;
use yii\base\Event;

/**
 * Description of Events
 *
 * @author luke
 */
class Events
{

    /**
     * TopMenu init event callback
     *
     * @see TopMenu
     * @param Event $event
     */
    public static function onTopMenuInit($event)
    {
        /** @var TopMenu $topMenu */
        $topMenu = $event->sender;

        $topMenu->addEntry(new MenuLink([
            'id' => 'dashboard',
            'label' => Yii::t('DashboardModule.base', 'Dashboard'),
            'url' => ['/dashboard/dashboard'],
            'icon' => 'dashboard',
            'sortOrder' => 100,
            'isActive' => MenuLink::isActiveState('dashboard')
        ]));
    }

}
