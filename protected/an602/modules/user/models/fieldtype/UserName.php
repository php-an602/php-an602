<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2020 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\models\fieldtype;

use an602\libs\Html;

/**
 * UserName is a virtual profile field
 * that displays the current user name of the user.
 *
 * @since 1.6
 */
class UserName extends BaseTypeVirtual
{

    /**
     * @inheritDoc
     */
    public function getVirtualUserValue($user, $raw = true)
    {
        if (empty($user->username)) {
            return '';
        }

        return Html::encode($user->username);
    }
}
