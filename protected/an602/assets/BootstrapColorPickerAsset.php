<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
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
