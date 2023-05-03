<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\assets;

use yii\web\AssetBundle;

/**
 * Socket.IO client files
 *
 * @since 1.3
 * @author luke
 */
class SocketIoAsset extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $sourcePath = '@npm/socket.io-client';

    /**
     * @inheritdoc
     */
    public $js = ['dist/socket.io.slim.js'];

}
