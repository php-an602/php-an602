<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2020 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\models\fieldtype;

use an602\libs\Html;

/**
 * UserEmail is a virtual profile field
 * that displays the current email address of the user.
 *
 * @since 1.6
 */
class UserEmail extends BaseTypeVirtual
{

    /**
     * @inheritDoc
     */
    public function getVirtualUserValue($user, $raw = true)
    {
        if (empty($user->email)) {
            return '';
        }

        if ($raw) {
            return Html::encode($user->email);
        } else {
            return Html::a(Html::encode($user->email), 'mailto:' . $user->email);
        }
    }
}
