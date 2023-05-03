<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\marketplace\assets;

use an602\components\assets\AssetBundle;

class Assets extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@marketplace/resources';

    /**
     * @inheritdoc
     */
    public $js = [
        'js/an602.marketplace.js'
    ];
}
