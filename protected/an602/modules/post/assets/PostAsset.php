<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2015 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\post\assets;

use an602\components\assets\AssetBundle;

class PostAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@post/resources';

    /**
     * @inheritdoc
     */
    public $js = [
        'js/an602.post.js'
    ];
}
