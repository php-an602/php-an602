<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\assets;

use an602\components\assets\AssetBundle;
use yii\web\View;

/**
 * AppDynamicAsset provides assets which are included in the core layout.
 * It similar to AppAsset but won't be compressed and combined.
 * So it can handle dynamic assets (e.g. javascript locales)
 *
 * @since 1.2
 */
class AppDynamicAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $defer = false;

    /**
     * @inheritdoc
     */
    public $jsOptions = ['position' => View::POS_HEAD];

    /**
     * @inheritdoc
     */
    public $depends = [
        JqueryTimeAgoLocaleAsset::class
    ];

}
