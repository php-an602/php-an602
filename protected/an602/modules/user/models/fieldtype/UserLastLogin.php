<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2020 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\models\fieldtype;

use an602\libs\Html;
use Yii;

/**
 * UserLastLogin is a virtual profile field
 * that displays the user last login dati
 *
 * @since 1.6
 */
class UserLastLogin extends BaseTypeVirtual
{

    /**
     * @inheritDoc
     * @throws \yii\base\InvalidConfigException
     */
    public function getVirtualUserValue($user, $raw = true)
    {
        if (empty($user->last_login)) {
            return '-';
        }

        return Yii::$app->formatter->asDate($user->last_login,'long');
    }
}
