<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\libs;

use yii\base\Event;

/**
 * This event holds references to parameters which can be modified.
 *
 * @author luke
 * @since 0.21
 */
class ParameterEvent extends Event
{

    /**
     * @var array the parameter references
     */
    public $parameters;

    /**
     * @inheritdoc
     */
    public function __construct($parameters)
    {
        $this->parameters = $parameters;
        $this->init();
    }
}
