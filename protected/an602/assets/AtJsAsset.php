<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
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
