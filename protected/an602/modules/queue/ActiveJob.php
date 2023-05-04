<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
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
