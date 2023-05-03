<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\assets;

use an602\components\assets\AssetBundle;

/**
 * jquery-autosize
 *
 * @author buddha
 */
class JqueryAutosizeAsset extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $sourcePath = '@npm/jquery-autosize';

    /**
     * @inheritdoc
     */
    public $js = ['jquery.autosize.min.js'];
}
