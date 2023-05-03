<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
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
