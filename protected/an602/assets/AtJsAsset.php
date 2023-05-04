<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 */

namespace an602\assets;

use yii\web\AssetBundle;

/**
 * jquery-At.js
 *
 * @author buddha
 * @deprecated since v1.5 not in use anymore
 */
class AtJsAsset extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $sourcePath = '@npm/at.js';

    /**
     * @inheritdoc
     */
    public $js = ['dist/js/jquery.atwho.min.js'];

    /**
     * @inheritdoc
     */
    public $depends = [
        CaretjsAsset::class,
        AtJsStyleAsset::class
    ];

}
