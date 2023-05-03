<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
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
