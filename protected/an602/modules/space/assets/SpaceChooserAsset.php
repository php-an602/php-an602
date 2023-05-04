<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2015 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\space\assets;

use an602\components\assets\AssetBundle;
use an602\modules\user\assets\UserAsset;

class SpaceChooserAsset extends AssetBundle
{
    public $sourcePath = '@space/resources';

    public $js = [
        'js/an602.space.chooser.js'
    ];

    public $depends = [
        SpaceAsset::class,
        UserAsset::class
    ];
}
