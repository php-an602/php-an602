<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\assets;

use an602\components\assets\WebStaticAssetBundle;
use an602\modules\ui\view\components\View;

/**
 * OpenSans Font
 *
 * @since 1.3
 * @author luke
 */
class OpenSansAsset extends WebStaticAssetBundle
{
    /**
     * @inheritdoc
     */
    public $defaultDepends = false;

    /**
     * @inheritdoc
     */
    public $jsPosition = View::POS_HEAD;

    /**
     * @inheritdoc
     */
    public $preload = [
        'css/open-sans.css'
    ];

    /**
     * @inheritdoc
     */
    public $css = [
        'css/open-sans.css',
    ];
}
