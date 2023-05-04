<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\space\helpers;

use Yii;
use an602\modules\user\models\User;
use an602\modules\space\models\Membership;
use an602\modules\space\models\Space;

/**
 * MembershipHelper
 *
 * @since 1.3
 * @author Luke
 */
class MembershipHelper
{

    /**
     * Returns an array of spaces where the given user is owner.
     * 
     * @param User|null $user the user or null for current user
     * @param boolean $useCache use cached result if available
     * @return Space[] the list of spaces
     */
    public static function getOwnSpaces(User $user = null, $useCache = true)
    {
        if ($user === null) {
            $user = Yii::$app->user->getIdentity();
        }

        $spaces = [];
        foreach (Membership::GetUserSpaces($user->id, $useCache) as $space) {
            if ($space->isSpaceOwner($user->id)) {
                $spaces[] = $space;
            }
        }
        return $spaces;
    }

}
