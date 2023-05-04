<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\queue\driver;

use yii\queue\sync\Queue;

/**
 * Sync queue driver
 *
 * @since 1.2
 * @author Luke
 */
class Sync extends Queue
{

    /**
     * @inheritdoc
     */
    public $handle = true;

}
