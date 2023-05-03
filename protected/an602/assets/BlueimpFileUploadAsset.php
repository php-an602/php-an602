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
