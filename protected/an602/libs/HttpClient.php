<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2020 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\libs;

use yii\httpclient\Client;
use yii\httpclient\CurlTransport;

/**
 * Class HttpClient
 *
 * @since 1.5
 * @package an602\libs
 * @property $transport CurlTransport
 */
class HttpClient extends Client
{
    /**
     * @inheritDoc
     */
    public function init()
    {
        $this->transport = new CurlTransport();
        parent::init();
    }

    /**
     * @inheritDoc
     */
    public function beforeSend($request)
    {
        $request->setOptions(CURLHelper::getOptions());
        parent::beforeSend($request);
    }

}
