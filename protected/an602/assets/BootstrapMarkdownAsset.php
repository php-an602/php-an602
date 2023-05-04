<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
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
