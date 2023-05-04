<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
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
