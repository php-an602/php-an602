<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\assets;

use an602\components\assets\WebStaticAssetBundle;

class HighlightJsAsset extends WebStaticAssetBundle
{

    /**
     * @inheritdoc
     */
    public $js = ['js/highlight.js/highlight.pack.js'];

    /**
     * @inheritdoc
     */
    public $depends = [
        HighlightJsStyleAsset::class
    ];
}
