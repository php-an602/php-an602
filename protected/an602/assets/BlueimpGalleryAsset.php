<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
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
