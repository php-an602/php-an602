<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2020 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\marketplace\jobs;

use an602\modules\marketplace\components\LicenceManager;
use an602\modules\queue\ActiveJob;

class PeActiveCheckJob extends ActiveJob
{
    /**
     * @inheritdoc
     */
    public function run()
    {
        LicenceManager::get();
    }
}
