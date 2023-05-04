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
class BlueimpFileUploadAsset extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $sourcePath = '@npm/blueimp-file-upload/js';

    /**
     * @inheritdoc
     */
    public $js = [
        'jquery.fileupload.js',
        'jquery.iframe-transport.js',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        JqueryWidgetAsset::class
    ];

    /**
     * @inheritdoc
     */
    public $publishOptions = [
        'only' => [
            'jquery.fileupload.js',
            'jquery.iframe-transport.js',
        ]
    ];

}
