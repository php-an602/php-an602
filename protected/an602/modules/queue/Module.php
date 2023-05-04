<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\queue;

use an602\components\Module as BaseModule;

/**
 * Queue base module
 *
 * @author Lucas Bartholemy <lucas@bartholemy.com>
 * @since 1.3
 */
class Module extends BaseModule
{
    /**
     * @var int default ttr for Long Running Jobs
     *
     * @since 1.15
     */
    public $longRunningJobTtr = 60 * 60;
}
