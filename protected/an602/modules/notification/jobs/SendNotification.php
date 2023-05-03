<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\notification\jobs;

use an602\modules\notification\components\BaseNotification;
use an602\modules\user\models\User;
use Yii;
use an602\modules\queue\ActiveJob;

/**
 * Description of SendNotification
 *
 * @author buddha
 * @since 1.2
 */
class SendNotification extends ActiveJob
{
    /**
     * @var BaseNotification notification instance
     */
    public $notification;

    /**
     * @var int the user id of the recipient
     */
    public $recipientId;

    /**
     * @inheritdoc
     */
    public function run()
    {
        $recipient = User::findOne(['id' => $this->recipientId]);
        if ($recipient !== null) {
            Yii::$app->notification->send($this->notification, $recipient);
        }
    }
}
