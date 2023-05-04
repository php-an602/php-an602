<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
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
