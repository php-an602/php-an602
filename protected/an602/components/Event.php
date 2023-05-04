<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
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
