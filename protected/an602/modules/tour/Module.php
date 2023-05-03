<?php

namespace an602\modules\tour;

use Yii;
use an602\modules\tour\widgets\Dashboard;


/**
 * This module shows an introduction tour for new users
 *
 * @package an602.modules_core.like
 * @since 0.5
 */
class Module extends \an602\components\Module
{
    /**
     * @var string[]
     */
    public $acceptableNames = ['interface', 'administration', 'profile', 'spaces'];

    /**
     * @inheritdoc
     */
    public $isCoreModule = true;

    /**
     * Event Callback
     */
    public static function onDashboardSidebarInit($event)
    {
        if (Yii::$app->user->isGuest)
            return;

        $settings = Yii::$app->getModule('tour')->settings;
        if ($settings->get('enable') == 1 && $settings->user()->get("hideTourPanel") != 1) {
            $event->sender->addWidget(Dashboard::class, [], ['sortOrder' => 100]);
        }
    }

}
