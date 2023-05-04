<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\queue\interfaces;

/**
 * ExclusiveJobInterface can be added to an ActiveJob to ensure this task is only
 * queued once. As example this is useful for asynchronous jobs like search index rebuild.
 *
 * @see \an602\modules\queue\ActiveJob
 * @author Luke
 */
interface ExclusiveJobInterface
{

    public function getExclusiveJobId();
}
