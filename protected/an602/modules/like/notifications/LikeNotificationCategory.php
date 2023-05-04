<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\like\notifications;

use Yii;
use an602\modules\notification\components\NotificationCategory;
use an602\modules\notification\targets\BaseTarget;
use an602\modules\notification\targets\MailTarget;

/**
 * LikeNotificationCategory
 *
 * @author buddha
 */
class LikeNotificationCategory extends NotificationCategory
{

    /**
     * @inheritdoc
     */
    public $id = 'like';

    /**
     * @inheritdoc
     */
    public function getDefaultSetting(BaseTarget $target)
    {
        if ($target instanceof MailTarget) {
            return false;
        }

        return parent::getDefaultSetting($target);
    }

    /**
     * @inheritdoc
     */
    public function getTitle()
    {
        return Yii::t('LikeModule.notifications', 'Likes');
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return Yii::t('LikeModule.notifications', 'Receive Notifications when someone likes your content.');
    }

}
