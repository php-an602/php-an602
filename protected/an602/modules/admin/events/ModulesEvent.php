<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2021 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\admin\events;

use an602\components\Module;
use yii\base\Event;

/**
 * This event is used when modules is listed and filtered
 *
 * @author luke
 * @since 1.11
 */
class ModulesEvent extends Event
{
    /**
     * @var Module[]|array
     */
    public $modules;
}
