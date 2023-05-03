<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\libs;

use yii\base\Event;

/**
 * WidgetCreateEvent is raised before creating a widget
 *
 * @see \an602\components\Widget
 * @author luke
 */
class WidgetCreateEvent extends Event
{

    /**
     * @var array Reference to the config of widget create
     */
    public $config;

    /**
     * @inheritdoc
     */
    public function __construct(&$attributes)
    {
        $this->config = &$attributes;
        $this->init();
    }
}
