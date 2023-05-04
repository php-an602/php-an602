<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2016 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\user\authclient;

/**
 * @deprecated 1.14
 */
class Live extends \yii\authclient\clients\Live
{

    /**
     * @inheritdoc
     */
    protected function defaultViewOptions()
    {
        return [
            'cssIcon' => 'fa fa-windows',
            'buttonBackgroundColor' => '#0078d7',
        ];
    }

    /**
     * @inheritdoc
     */
    protected function defaultNormalizeUserAttributeMap()
    {
        return [
            'username' => 'name',
            'firstname' => 'first_name',
            'lastname' => 'last_name',
            'email' => function ($attributes) {
                if (isset($attributes['emails']['preferred'])) {
                    return $attributes['emails']['preferred'];
                } elseif (isset($attributes['emails']['account'])) {
                    return $attributes['emails']['account'];
                }
                return "";
            },
        ];
    }

}
