<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\queue\driver;

use yii\queue\Queue;

/**
 * Instant queue driver, mainly used for testing purposes
 *
 * @since 1.2
 * @author buddha
 */
class Instant extends Queue
{
    /**
     * @var int the message counter
     */
    protected $messageId = 1;

    /**
     * @inheritdoc
     */
    protected function pushMessage($message, $ttr, $delay, $priority)
    {
        $this->handleMessage($this->messageId, $message, $ttr, 1);
        $this->messageId++;
    }

    /**
     * @inheritdoc
     */
    public function status($id)
    {
        return Queue::STATUS_DONE;
    }
}
