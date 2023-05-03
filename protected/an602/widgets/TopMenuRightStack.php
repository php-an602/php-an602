<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
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
