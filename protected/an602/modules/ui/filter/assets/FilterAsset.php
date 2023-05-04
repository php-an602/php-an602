<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2018 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
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
