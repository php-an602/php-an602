<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\assets;

use an602\components\assets\AssetBundle;

class ProsemirrorEditorAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@npm/an602-prosemirror-richtext/dist/';

    /**
     * @inheritdoc
     */
    public $js = ['an602-editor.js'];
}
