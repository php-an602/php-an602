<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
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
