<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\content\widgets;

/**
 * Stream Wrapper for older theme versions
 *
 * @deprecated since version 1.2
 * @author Luke
 */
class Stream extends \an602\components\Widget
{

    public static function widget($config = [])
    {
        $config['class'] = \an602\modules\stream\widgets\StreamViewer::class;
        return parent::widget($config);
    }

}
