<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\admin\assets;

use yii\web\AssetBundle;
use yii\web\View;

class AdminGroupAsset extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $jsOptions = [
        'position' => View::POS_END
    ];
    public $sourcePath = '@admin/resources';

    /**
     * @inheritdoc
     */
    public $js = [
        'js/an602.admin.group.js'
    ];

}
