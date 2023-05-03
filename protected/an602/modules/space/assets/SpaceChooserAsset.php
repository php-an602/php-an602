<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
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
