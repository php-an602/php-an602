<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\queue\interfaces;

/**
 * QueueInfoInterface
 *
 * @author Luke
 */
interface QueueInfoInterface
{
    /**
     * @return int|null the number of waiting jobs in the queue
     */
    public function getWaitingJobCount();

    /**
     * @return int|null the number of delayed jobs in the queue
     */
    public function getDelayedJobCount();

    /**
     * @return int|null the number of reserved jobs in the queue
     */
    public function getReservedJobCount();

    /**
     * @return int|null the number of done jobs in the queue
     */
    public function getDoneJobCount();
}
