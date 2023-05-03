<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * jquery-knob
 *
 * @author luke
 */
class JqueryKnobAsset extends AssetBundle
{

    public $jsOptions = ['position' => View::POS_BEGIN];

    /**
     * @inheritdoc
     */
    public $sourcePath = '@npm/jquery-knob';

    /**
     * @inheritdoc
     */
    public $js = ['dist/jquery.knob.min.js'];

    public $depends = ['an602\assets\AppAsset'];

}
