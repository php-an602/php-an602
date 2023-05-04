<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\user\events;

use an602\components\Event;

/**
 * UserEvent
 *
 * @since 1.2
 * @author Luke
 */
class UserEvent extends Event
{

    /**
     * @var \an602\modules\user\models\User the user
     */
    public $user;

}
