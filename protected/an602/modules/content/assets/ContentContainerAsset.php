<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\content\assets;

use an602\components\assets\AssetBundle;

/**
 * Content container asset for shared user/space js functionality.
 *
 * @since 1.2
 * @author buddha
 */
class ContentContainerAsset extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $sourcePath = '@content/resources';

    /**
     * @inheritdoc
     */
    public $js = [
        'js/an602.content.container.js'
    ];

}
