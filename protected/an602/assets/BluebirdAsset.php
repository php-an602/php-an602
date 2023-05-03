<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\assets;

use an602\components\assets\AssetBundle;
use an602\modules\ui\view\components\View;

/**
 * bluebird promis library
 *
 * @author luke
 */
class BluebirdAsset extends AssetBundle
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
    public $sourcePath = '@npm/bluebird';

    /**
     * @inheritdoc
     */
    public $js = ['js/browser/bluebird.min.js'];
}
