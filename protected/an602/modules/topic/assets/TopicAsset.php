<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2018 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
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
