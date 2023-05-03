<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace user\functional;

use an602\modules\user\models\User;
use user\FunctionalTester;

class UserAccessCest
{

    public function testDisabledUserAccess(FunctionalTester $I)
    {
        $I->wantTo('ensure that disabled users have no access');

        $I->amUser2();
        $I->amGoingTo('to deactivate the current user');

        $user = User::findOne(3);
        $user->status = User::STATUS_DISABLED;
        $user->save();

        $I->amOnPage(['/dashboard/dashboard']);
        $I->see('Please sign in');
    }

    public function testNeedApprovalUserAccess(FunctionalTester $I)
    {
        $I->wantTo('ensure that see admin information permission works');

        $I->amUser2();
        $I->amGoingTo('to deactivate the current user');

        $user = User::findOne(3);
        $user->status = User::STATUS_NEED_APPROVAL;
        $user->save();

        $I->amOnPage(['/dashboard/dashboard']);
        $I->see('Please sign in');
    }
}
