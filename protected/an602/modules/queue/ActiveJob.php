<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\queue;

use yii\base\BaseObject;
use an602\modules\queue\interfaces\JobInterface;

/**
 * ActiveJob
 * 
 * @since 1.3
 * @author Luke
 */
abstract class ActiveJob extends BaseObject implements JobInterface
{

    /**
     * Runs this job
     */
    abstract public function run();

    /**
     * @inheritdoc
     */
    public function execute($queue)
    {
        return $this->run();
    }

}
