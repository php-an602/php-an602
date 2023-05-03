<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\activity\jobs;

use an602\modules\activity\Module;
use an602\modules\queue\interfaces\ExclusiveJobInterface;
use Yii;
use an602\modules\queue\ActiveJob;
use an602\modules\activity\components\MailSummaryProcessor;
use an602\modules\activity\components\MailSummary;
use yii\queue\RetryableJobInterface;

/**
 * SendMailSummary
 *
 * @since 1.2
 * @author Luke
 */
class SendMailSummary extends ActiveJob implements ExclusiveJobInterface, RetryableJobInterface
{

    /**
     * @var int the interval
     */
    public $interval;


    /**
     * @var int maximum 1 hour
     */
    private $maxExecutionTime = 60 * 60 * 1;

    /**
     * @inhertidoc
     */
    public function getExclusiveJobId()
    {
        return get_class($this) . $this->interval;
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        /** @var Module $module */
        $module = Yii::$app->getModule('activity');
        if (!$module->enableMailSummaries) {
            return;
        }

        if ($this->interval === MailSummary::INTERVAL_DAILY || $this->interval === MailSummary::INTERVAL_HOURLY || $this->interval === MailSummary::INTERVAL_WEEKLY) {
            MailSummaryProcessor::process($this->interval);
        } else {
            Yii::error('Invalid summary interval given' . $this->interval, 'activity.job');
            return;
        }
    }

    /**
     * @inheritDoc
     */
    public function getTtr()
    {
        return $this->maxExecutionTime;
    }

    /**
     * @inheritDoc
     */
    public function canRetry($attempt, $error)
    {
        return false;
    }

}
