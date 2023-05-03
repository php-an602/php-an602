<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\assets;

use yii\web\AssetBundle;

/**
 * Html5shivAsssets - the HTML5 shim, for IE6-8 support of HTML5 elements
 *
 * @since 1.2
 * @author Luke
 * @deprecated since v1.5 not in use anymore
 */
class IEFixesAsset extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $basePath = '@webroot-static';

    /**
     * @inheritdoc
     */
    public $baseUrl = '@web-static';

    /**
     * @inheritdoc
     */
    public $css = [
        'css/ie.css',
    ];

    /**
     * @inheritdoc
     */
    public $cssOptions = [
        'condition' => 'lt IE 9'
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'an602\assets\Html5shivAsset',
    ];

}
