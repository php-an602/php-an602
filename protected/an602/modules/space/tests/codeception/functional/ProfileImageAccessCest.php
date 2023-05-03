<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace space\functional;

use an602\modules\space\models\Space;
use space\FunctionalTester;

class ProfileImageAccessCest
{
    public function testUploadAccessForSpaceAdmin(FunctionalTester $I)
    {
        $I->wantTo('ensure that space admins can access profile image upload');
        $I->assertSpaceAccessTrue(Space::USERGROUP_ADMIN, 'space/manage/image/upload');
    }

    public function testUploadAccessForGuest(FunctionalTester $I)
    {
        $I->wantTo('ensure that space admins can access profile image upload');
        $I->assertSpaceAccessFalse(Space::USERGROUP_GUEST, 'space/manage/image/upload');
    }

    public function testUploadAccessForMember(FunctionalTester $I)
    {
        $I->wantTo('ensure that space admins can access profile image upload');
        $I->assertSpaceAccessFalse(Space::USERGROUP_MEMBER, 'space/manage/image/upload');
    }

    public function testUploadAccessForUser(FunctionalTester $I)
    {
        $I->wantTo('ensure that space admins can access profile image upload');
        $I->assertSpaceAccessFalse(Space::USERGROUP_USER, 'space/manage/image/upload');
    }

    public function testUploadAccessForModerator(FunctionalTester $I)
    {
        $I->wantTo('ensure that space admins can access profile image upload');
        $I->assertSpaceAccessFalse(Space::USERGROUP_MODERATOR, 'space/manage/image/upload');
    }
}
