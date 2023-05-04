<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2021 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\ui\form\assets;

use yii\web\AssetBundle;
use yii\web\View;

class CodeMirrorAssetBundle extends AssetBundle
{
    /**
     * v1.5 compatibility defer script loading
     *
     * Migrate to an602 AssetBundle once minVersion is >=1.5
     *
     * @var bool
     */
    public $defer = true;

    public $jsOptions = ['position' => View::POS_HEAD];
    public $sourcePath = '@vendor/npm-asset/codemirror';

    public $js = [
        'lib/codemirror.js',
        'addon/hint/show-hint.js',
        'addon/hint/html-hint.js',
        'addon/hint/xml-hint.js',
        'mode/xml/xml.js',
        'mode/javascript/javascript.js',
        'mode/css/css.js',
        'mode/htmlmixed/htmlmixed.js',
    ];

    public $css = [
        'lib/codemirror.css',
        'addon/hint/show-hint.css'
    ];

}