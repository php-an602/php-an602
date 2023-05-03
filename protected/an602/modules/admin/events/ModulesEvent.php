<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
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
