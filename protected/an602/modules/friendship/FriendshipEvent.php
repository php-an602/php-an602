<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\friendship;

use yii\base\Event;

/**
 * FriendshipEvent
 * 
 * @since 1.2
 * @author Luke
 */
class FriendshipEvent extends Event
{

    /**
     * @var \an602\modules\user\models\User first user
     */
    public $user1;

    /**
     * @var \an602\modules\user\models\User second user
     */
    public $user2;

}
