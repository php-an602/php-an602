<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2020 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\user\models\fieldtype;

use an602\libs\Html;
use Yii;

/**
 * UserMemberSince is a virtual profile field
 * that displays the user member since information
 *
 * @since 1.6
 */
class UserMemberSince extends BaseTypeVirtual
{

    /**
     * @inheritDoc
     */
    public function getVirtualUserValue($user, $raw = true)
    {
        if (empty($user->created_at)) {
            return '';
        }

        return Yii::$app->formatter->asDate($user->created_at,'long');
    }
}
