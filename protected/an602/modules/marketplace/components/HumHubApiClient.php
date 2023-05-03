<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2020 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\marketplace\components;

use an602\libs\HttpClient;
use Yii;

/**
 * HttpClient
 *
 * @since 1.5
 */
class An602ApiClient extends HttpClient
{
    /**
     * @inheritDoc
     */
    public $baseUrl;

    /**
     * @inheritDoc
     */
    public function init()
    {
        if (empty($this->baseUrl)) {
            $this->baseUrl = Yii::$app->params['an602']['apiUrl'];

        }

        parent::init();
    }

    /**
     * @inheritDoc
     */
    public function beforeSend($request)
    {
        $request->addData([
            'version' => Yii::$app->version,
            'installId' => Yii::$app->getModule('admin')->settings->get('installationId')
        ]);
        parent::beforeSend($request);
    }
}
