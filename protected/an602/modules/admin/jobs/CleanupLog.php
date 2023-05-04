<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\admin\jobs;

use an602\modules\queue\ActiveJob;
use an602\modules\admin\models\Log;

/**
 * CleanupLog deletes older log records from log table
 *
 * @since 1.2
 * @author Luke
 */
class CleanupLog extends ActiveJob
{

    /**
     * @var int seconds before delete old log messages
     */
    public $cleanupInterval = 60 * 60 * 24 * 7;

    /**
     * @inheritdoc
     */
    public function run()
    {
        Log::deleteAll(['<', 'log_time', time() - $this->cleanupInterval]);
    }

}
