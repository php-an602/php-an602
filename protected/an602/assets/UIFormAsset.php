<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 */

namespace an602\assets;

use yii\web\AssetBundle;

/**
 * tabbed form asset
 *
 * @author buddha
 * @deprecated since 1.4 the ui.form namespace is now part of core api
 */
class UIFormAsset extends AssetBundle
{

    public $jsOptions = ['position' => \yii\web\View::POS_END];

    public $basePath = '@webroot-static';
    public $baseUrl = '@web-static';

    /**
     * @inheritdoc
     */
    public $js = ['js/an602/an602.ui.form.js'];

}
