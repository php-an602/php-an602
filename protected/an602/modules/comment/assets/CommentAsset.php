<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\comment\assets;

use an602\components\assets\AssetBundle;

class CommentAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@comment/resources';

    /**
     * @inheritdoc
     */
    public $js = [
        'js/an602.comment.js'
    ];
}
