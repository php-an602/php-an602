<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\assets;

use Yii;
use yii\web\AssetBundle;

/**
 * TimeAgo Asset Bundle
 *
 * @author luke
 */
class JqueryTimeEntryAsset extends AssetBundle
{

    public $publishOptions = [
        'forceCopy' => false
    ];

    /**
     * @inheritdoc
     */
    public $sourcePath = '@npm/kbw.timeentry';

    /**
     * @inheritdoc
     */
    public $js = ['jquery.plugin.js', 'jquery.timeentry.js'];

    /**
     * @inheritdoc
     */
    public $css = ['jquery.timeentry.css'];

}
