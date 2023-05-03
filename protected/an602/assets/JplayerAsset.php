<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\assets;

use yii\web\AssetBundle;

/**
 * jquery-At.js
 *
 * @author buddha
 */
class JplayerAsset extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $sourcePath = '@npm/jplayer/dist';

    /**
     * @inheritdoc
     */
    public $js = [
        'jplayer/jquery.jplayer.js',
        'add-on/jplayer.playlist.js',
    ];

    /**
     * @inheritdoc
     */
    public $css = ['skin/blue.monday/css/jplayer.blue.monday.min.css'];

}
