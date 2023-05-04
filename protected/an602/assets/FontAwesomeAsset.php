<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 */

namespace an602\assets;

use an602\components\assets\AssetBundle;

/**
 * Fontawesome
 *
 * @author luke
 */
class FontAwesomeAsset extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $sourcePath = '@npm/font-awesome';

    /**
     * @inheritdoc
     */
    public $css = ['css/font-awesome.min.css'];

}
