<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 */

namespace an602\assets;

use an602\components\assets\AssetBundle;

/**
 * NProgress assets
 *
 * @since 1.2
 * @author luke
 */
class NProgressAsset extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $sourcePath = '@npm/nprogress';

    /**
     * @inheritdoc
     */
    public $js = [
        'nprogress.js'
    ];


    /**
     * @inheritdoc
     */
    public $publishOptions = [
        'only' => [
            '/nprogress.css',
            '/nprogress.js'
        ],
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        NProgressStyleAsset::class
    ];
}
