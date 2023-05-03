<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\modules\content\assets;

use an602\assets\ProsemirrorEditorAsset;
use an602\components\assets\AssetBundle;
/**
 * Asset for core content resources.
 *
 * @since 1.3
 * @author buddha
 */
class ProseMirrorRichTextAsset extends AssetBundle
{
     /**
     * @inheritdoc
     */
    public $sourcePath = '@content/resources';

     /**
     * @inheritdoc
     */
    public $js = [
        'js/an602.ui.richtext.prosemirror.js'
    ];

     /**
     * @inheritdoc
     */
    public $depends = [
        ProsemirrorEditorAsset::class
    ];

}
