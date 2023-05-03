<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\assets;

use an602\components\assets\WebStaticAssetBundle;

/**
 * jquery-At.js
 *
 * @author buddha
 */
class JplayerModuleAsset extends WebStaticAssetBundle
{
    /**
     * @inheritdoc
     */
    public $js = [
        'js/an602/an602.media.Jplayer.js',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        JplayerAsset::class
    ];
}
