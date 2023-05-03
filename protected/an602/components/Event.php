<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\components;

/**
 * Event is the base class for all event classes.
 *
 * @since 1.2.3
 * @author Luke
 */
class Event extends \yii\base\Event
{

    /**
     * @var mixed an optional result which can be manipulated by the event handler.
     * Note that this varies according to which event is currently executing.
     */
    public $result;
}
