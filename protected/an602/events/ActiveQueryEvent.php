<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\events;

use yii\base\Event;
use yii\db\ActiveQuery;

/**
 * ActiveQueryEvent represents the parameter needed by [[ActiveQuery]] events.
 * 
 * @since 1.2.3
 * @author Luke
 */
class ActiveQueryEvent extends Event
{

    /**
     * @var ActiveQuery the active query
     */
    public $query;
}
