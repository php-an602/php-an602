<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\notifications;

use Yii;
use an602\modules\notification\components\NotificationCategory;

/**
 * Description of FollowingNotificationCategory
 *
 * @author buddha
 */
class FollowedNotificationCategory extends NotificationCategory
{

    /**
     * @inheritdoc
     */
    public $id = 'followed';

    /**
     * @inheritdoc
     */
    public function getTitle()
    {
        return Yii::t('UserModule.notification', 'Following');
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return Yii::t('UserModule.notification', 'Receive Notifications when someone is following you.');
    }

}
