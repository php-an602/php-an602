<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\modules\ui\filter\assets;

use an602\components\assets\AssetBundle;
use an602\modules\topic\assets\TopicAsset;

class FilterAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@ui/filter/resources';

    /**
     * @inheritdoc
     */
    public $js = [
        'js/an602.ui.filter.js'
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        TopicAsset::class
    ];
}
