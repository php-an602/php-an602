<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\assets;

use yii\web\AssetBundle;

/**
 * select2
 *
 * @author buddha
 */
class Select2Asset extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $sourcePath = '@npm/select2/dist/js';

    /**
     * @inheritdoc
     */
    public $js = ['select2.full.min.js'];

    /**
     * @inheritdoc
     */
    public $depends = [
        Select2StyleAsset::class
    ];
}
