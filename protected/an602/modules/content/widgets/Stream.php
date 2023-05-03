<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
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
