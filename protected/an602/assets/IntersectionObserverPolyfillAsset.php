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
