<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\modules\topic\assets;

use an602\components\assets\AssetBundle;

class TopicAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@topic/resources';

    /**
     * @inheritdoc
     */
    public $js = [
        'js/an602.topic.js'
    ];
}
