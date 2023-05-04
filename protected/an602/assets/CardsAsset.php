<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2021 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 */

namespace an602\assets;

use an602\components\assets\WebStaticAssetBundle;
use yii\web\View;

class CardsAsset extends WebStaticAssetBundle
{
    /**
     * @inheritdoc
     */
    public $js = [
        'js/an602/an602.cards.js',
    ];

    /**
     * @inheritdoc
     */
    public $jsOptions = ['position' => View::POS_END];

}
