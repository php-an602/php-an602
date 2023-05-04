<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2015 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\like\assets;

use an602\components\assets\AssetBundle;

/**
 * Assets for like related resources.
 *
 * @since 1.2
 * @author buddha
 */
class LikeAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@like/resources';

    /**
     * @inheritdoc
     */
    public $js = [
        'js/an602.like.js'
    ];

}
