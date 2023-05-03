<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
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
