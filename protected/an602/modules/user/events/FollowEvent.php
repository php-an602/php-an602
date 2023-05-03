<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\events;

use yii\base\Event;

/**
 * FollowEvent
 *
 * @since 1.2
 * @author Luke
 */
class FollowEvent extends Event
{

    /**
     * @var \an602\modules\user\models\User
     */
    public $user;

    /**
     * @var \an602\components\ActiveRecord the followed item
     */
    public $target;

}
