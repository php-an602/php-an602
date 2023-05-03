<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2016 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
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
