<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\assets;

use yii\web\AssetBundle;

/**
 * jquery-caretjs.js
 *
 * @author buddha
 */
class CaretjsAsset extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $sourcePath = '@bower/caret.js';

    /**
     * @inheritdoc
     */
    public $js = ['dist/jquery.caret.min.js'];
}
