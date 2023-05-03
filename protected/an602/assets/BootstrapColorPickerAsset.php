<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\assets;

use an602\components\assets\WebStaticAssetBundle;

/**
 * jquery-color
 *
 * @author buddha
 */
class BootstrapColorPickerAsset extends WebStaticAssetBundle
{
    /**
     * @inheritdoc
     */
    public $js = ['js/colorpicker/js/bootstrap-colorpicker-modified.js'];

     /**
     * @inheritdoc
     */
    public $css = ['js/colorpicker/css/bootstrap-colorpicker.min.css'];

}
