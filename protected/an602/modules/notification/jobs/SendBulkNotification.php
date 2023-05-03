<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\notification\jobs;

use an602\modules\queue\ActiveJob;
use an602\modules\user\components\ActiveQueryUser;
use Yii;

/**
 * Description of SendNotification
 *
 * @author buddha
 * @since 1.2
 */
class SendBulkNotification extends ActiveJob
{
    /**
     * @var array Basenotification data as array.
     */
    public $notification;

    /**
     * @var ActiveQueryUser the query to determine which users should receive this notification
     */
    public $query;

    /**
     * @inheritdoc
     */
    public function run()
    {
        Yii::$app->notification->sendBulk($this->notification, $this->query);
    }
}
