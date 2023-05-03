<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
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
