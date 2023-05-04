<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 */

namespace an602\assets;

use an602\components\assets\AssetBundle;
use yii\web\View;

/**
 * animate.css
 *
 * @author buddha
 */
class IntersectionObserverPolyfillAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $defaultDepends = false;

    /**
     * @inheritdoc
     */
    public $defer = false;

    /**
     * @inheritdoc
     */
    public $jsPosition = View::POS_HEAD;

    /**
     * @inheritdoc
     */
    public $sourcePath = '@npm/intersection-observer';

    /**
     * @inheritdoc
     */
    public $js = ['intersection-observer.js'];

    /**
     * @inheritdoc
     */
    public $publishOptions = [
        'only' => [
            'intersection-observer.js'
        ]
    ];

}
