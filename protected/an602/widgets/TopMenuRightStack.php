<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 */

namespace an602\widgets;

use Yii;
use an602\modules\user\components\User;

/**
 * TopMenuRightStackWidget holds items like search (right part)
 *
 * @since 0.6
 * @author Luke
 */
class TopMenuRightStack extends BaseStack
{

    /**
     * @inheritdoc
     */
    public function run()
    {
        // Don't show stack if guest access is disabled and user is not logged in
        if (Yii::$app->user->isGuest && !User::isGuestAccessEnabled()) {
            return;
        }

        return parent::run();
    }

}
