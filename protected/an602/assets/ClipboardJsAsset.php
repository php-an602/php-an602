<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\assets;

use an602\components\assets\AssetBundle;

/**
 * Clipboard JS
 *
 * @author luke
 */
class ClipboardJsAsset extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $sourcePath = '@npm/clipboard-polyfill/dist/main';

    /**
     * @inheritdoc
     */
    public $js = ['clipboard-polyfill.js'];

    public $publishOptions = [
        'only' => ['clipboard-polyfill.js', 'clipboard-polyfill.js.map']
    ];

}
