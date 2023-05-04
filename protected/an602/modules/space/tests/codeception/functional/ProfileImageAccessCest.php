<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
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
