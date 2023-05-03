<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\assets;

use an602\components\assets\AssetBundle;

/**
 * animate.css
 *
 * @author buddha
 */
class SwipedEventsAssets extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $sourcePath = '@npm/swiped-events/dist';

    /**
     * @inheritdoc
     */
    public $js = ['swiped-events.min.js'];

}
