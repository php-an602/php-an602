<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
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
