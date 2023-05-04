<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 *
 */

use an602\modules\content\widgets\WallEntryControls;
use an602\modules\user\widgets\AccountSettingsMenu;
use an602\modules\topic\Events;
use an602\modules\space\modules\manage\widgets\DefaultMenu;

return [
    'id' => 'topic',
    'class' => \an602\modules\topic\Module::class,
    'isCoreModule' => true,
    'events' => [
        ['class' => WallEntryControls::class, 'event' => WallEntryControls::EVENT_INIT, 'callback' => [Events::class, 'onWallEntryControlsInit']],
        ['class' => DefaultMenu::class, 'event' => DefaultMenu::EVENT_INIT, 'callback' => [Events::class, 'onSpaceSettingMenuInit']],
        ['class' => AccountSettingsMenu::class, 'event' => AccountSettingsMenu::EVENT_INIT, 'callback' => [Events::class, 'onProfileSettingMenuInit']],
    ],
];
