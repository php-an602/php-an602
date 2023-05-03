<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\assets;

use yii\web\AssetBundle;

/**
 * Bootstrap Markdown
 *
 * @see https://github.com/toopay/bootstrap-markdown
 * @author luke
 */
class BootstrapMarkdownAsset extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $sourcePath = '@npm/bootstrap-markdown';

    /**
     * @inheritdoc
     */
    public $js = [
        'js/bootstrap-markdown.js',
    ];

    /**
     * @inheritdoc
     */
    public $css = ['css/bootstrap-markdown.min.css'];

}
