<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 *
 */

namespace an602\assets;

use an602\components\assets\AssetBundle;

class ProsemirrorEditorAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@npm/humhub-prosemirror-richtext/dist/';

    /**
     * @inheritdoc
     */
    public $js = ['humhub-editor.js'];
}
