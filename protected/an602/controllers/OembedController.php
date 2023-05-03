<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\controllers;


use an602\components\Controller;
use an602\models\UrlOembed;
use Yii;
use yii\web\HttpException;

/**
 * @since 1.3
 */
class OembedController extends Controller
{
    /**
     * @inheritdoc
     */
    public function getAccessRules()
    {
        return [['login']];
    }

    /**
     * Fetches oembed content for the posted urls.
     *
     * @return \yii\web\Response
     */
    public function actionIndex()
    {
        $urls = Yii::$app->request->post('urls', []);
        $result = [];
        foreach ($urls as $url) {
            $oembed = UrlOembed::getOEmbed($url, true);
            if ($oembed) {
                $result[$url] = $oembed;
            }
        }

        return $this->asJson($result);
    }

    /**
     * Display the hidden embedded content
     */
    public function actionDisplay()
    {
        $this->forcePostRequest();

        $url = Yii::$app->request->post('url');
        if (empty($url)) {
            throw new HttpException(400, 'URL is not provided!');
        }

        $urlData = parse_url($url);
        if (!isset($urlData['host'])) {
            throw new HttpException(400, 'Wrong URL!');
        }

        if (Yii::$app->request->post('alwaysShow', false)) {
            UrlOembed::saveAllowedDomain($urlData['host']);
        }

        $urlOembed = UrlOembed::findExistingOembed($url);

        return $this->asJson([
            'success' => true,
            'content' => $urlOembed ? $urlOembed->preview : UrlOembed::loadUrl($url)
        ]);
    }
}
