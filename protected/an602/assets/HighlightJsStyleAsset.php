<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\assets;

use an602\components\assets\WebStaticAssetBundle;

class HighlightJsStyleAsset extends WebStaticAssetBundle
{

    /**
     * @inheritdoc
     */
    public $css = ['js/highlight.js/styles/github.css'];
}
