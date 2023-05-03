<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\assets;

use an602\components\assets\AssetBundle;

/**
 * Fontawesome
 *
 * @author luke
 */
class FontAwesomeAsset extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $sourcePath = '@npm/font-awesome';

    /**
     * @inheritdoc
     */
    public $css = ['css/font-awesome.min.css'];

}
