<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\assets;

use an602\assets\Select2Asset;
use an602\components\assets\AssetBundle;

class UserPickerAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@user/resources';

    /**
     * @inheritdoc
     */
    public $js = [
        'js/an602.user.picker.js'
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        Select2Asset::class
    ];
}
