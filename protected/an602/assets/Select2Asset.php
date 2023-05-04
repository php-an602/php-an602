<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
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
