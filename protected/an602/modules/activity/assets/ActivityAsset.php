<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\activity\assets;

use an602\components\assets\AssetBundle;
use an602\modules\stream\assets\StreamAsset;

class ActivityAsset extends AssetBundle
{

    public $sourcePath = '@activity/resources';

    public $js = [
        'js/an602.activity.js'
    ];

    public $depends = [
        StreamAsset::class
    ];

}
