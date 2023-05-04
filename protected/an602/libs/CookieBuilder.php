<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2022 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
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
