<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2015 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\content\assets;

use yii\web\AssetBundle;

/**
 * Asset for stream content create form resources.
 *
 * @since 1.2
 * @author buddha
 */
class ContentFormAsset extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $jsOptions = ['position' => \yii\web\View::POS_END];

    /**
     * @inheritdoc
     */
    public $sourcePath = '@content/resources';

    /**
     * @inheritdoc
     */
    public $js = [
        'js/an602.content.form.js'
    ];
}
