<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 */

namespace an602\assets;

use an602\components\assets\AssetBundle;

/**
 * jQery Blueimp File Upload
 *
 * @author luke
 */
class BlueimpGalleryAsset extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $sourcePath = '@npm/blueimp-gallery/js';

    /**
     * @inheritdoc
     */
    public $js = [
        'blueimp-gallery.min.js',
    ];

    /**
     * @inheritdoc
     */
    public $publishOptions = [
        'only' => [
            'blueimp-gallery.min.js',
            'blueimp-gallery.min.js.map'
        ]
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        JqueryWidgetAsset::class,
        BlueimpGalleryStyleAsset::class
    ];
}
