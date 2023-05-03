<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\admin\libs;

use an602\modules\marketplace\Module;
use Yii;
use yii\helpers\Json;
use an602\libs\CURLHelper;

/**
 * An602API provides access to an602.com for fetching available modules or latest version.
 *
 * @author luke
 */
class An602API
{

    /**
     * An602 API
     *
     * @param string $action
     * @param array $params
     * @return array
     */
    public static function request($action, $params = [])
    {
        if (!Yii::$app->params['an602']['apiEnabled'] || !Yii::$app->hasModule('marketplace')) {
            return [];
        }

        try {
            /** @var Module $marketplace */
            $marketplace = Yii::$app->getModule('marketplace');

            $response = $marketplace->getAn602Api()->get($action)->addData($params)->send();
            return $response->getData();
        } catch (\Exception $ex) {
            Yii::error('Could not parse An602 API response! ' . $ex->getMessage());
            return [];
        }
    }

    /**
     * Fetch latest An602 version online
     *
     * @return string latest An602 Version
     */
    public static function getLatestAn602Version($useCache = true)
    {
        $latestVersion = Yii::$app->cache->get('latestVersion');
        if (!$useCache || $latestVersion === false) {
            $info = self::request('v1/modules/getLatestVersion');

            if (isset($info['latestVersion'])) {
                $latestVersion = $info['latestVersion'];
            }

            Yii::$app->cache->set('latestVersion', $latestVersion);
        }

        return $latestVersion;
    }

}
