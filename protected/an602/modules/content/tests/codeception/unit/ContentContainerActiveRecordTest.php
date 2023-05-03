<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2020 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace tests\codeception\unit\modules\content;

use an602\modules\user\models\User;
use tests\codeception\_support\An602DbTestCase;

use an602\modules\space\models\Space;
use Yii;

class ContentContainerActiveRecordTest extends An602DbTestCase
{

    public function testUserIsNotASpace()
    {
        $user = User::findOne(['id' => 1]);
        $space = Space::findOne(['id' => 2]);

        $this->assertFalse($user->is($space));
    }

    public function testSpaceIsSameSpace()
    {
        $space = Space::findOne(['id' => 1]);
        $space1 = Space::findOne(['id' => 1]);

        $this->assertTrue($space->is($space1));
    }

    public function testUserIsNotAnotherUser()
    {
        $user = User::findOne(['id' => 1]);
        $user2 = User::findOne(['id' => 2]);

        $this->assertFalse($user->is($user2));
    }

    public function testUserIsSameUser()
    {
        $user = User::findOne(['id' => 1]);
        $user1 = User::findOne(['id' => 1]);

        $this->assertTrue($user->is($user1));
    }

    public function testGuestISNotUser()
    {
        $user = User::findOne(['id' => 1]);

        $this->assertFalse($user->is(Yii::$app->user->getIdentity()));
    }

    public function testNullISNotUser()
    {
        $space = Space::findOne(['id' => 1]);

        $this->assertFalse($space->is(null));
    }
}
