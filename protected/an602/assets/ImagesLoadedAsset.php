<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\assets;

use an602\components\assets\AssetBundle;

/**
 * masonry asset class
 *
 * @author buddha
 */
class ImagesLoadedAsset extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $sourcePath = '@npm/imagesloaded';

    /**
     * @inheritdoc
     */
    public $js = ['imagesloaded.pkgd.min.js'];
}
