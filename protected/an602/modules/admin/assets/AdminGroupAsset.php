<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
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
