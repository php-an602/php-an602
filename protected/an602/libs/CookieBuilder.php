<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2022 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\libs;

use Yii;
use yii\di\Container;
use yii\web\Cookie;

/**
 * DI Helper to bake secure cookies.
 *
 * @since 1.13
 */
class CookieBuilder
{
    /**
     * @param $container Container
     * @param $params array
     * @param $config
     * @return Cookie
     */
    public static function build($container, $params, $config)
    {
        $cookie = new Cookie($config);

        if (Yii::$app->request->autoEnsureSecureConnection &&
            Yii::$app->request->isSecureConnection) {
            $cookie->secure = true;
        }

        return $cookie;
    }
}
