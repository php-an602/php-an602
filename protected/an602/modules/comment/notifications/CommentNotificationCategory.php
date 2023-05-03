<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\comment\notifications;

use Yii;
use an602\modules\notification\components\NotificationCategory;

/**
 * CommentNotificationCategory
 *
 * @author buddha
 */
class CommentNotificationCategory extends NotificationCategory
{

    /**
     * @inheritdoc
     */
    public $id = "comments";

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return Yii::t('CommentModule.notification', 'Receive Notifications when someone comments on my own or a following post.');
    }

    /**
     * @inheritdoc
     */
    public function getTitle()
    {
        return Yii::t('CommentModule.notification', 'Comments');
    }

}
