<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2019 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace tests\codeception\unit\models;


use tests\codeception\_support\An602DbTestCase;
use an602\modules\user\models\User;

class UsernameTest extends An602DbTestCase
{

    public function testUserNameValidation()
    {
        $user = User::findOne(['id' => 1]);
        $user->username = 'valid';
        $this->assertTrue($user->validate('username'));
        $user->username = "test\x00Char";
        $this->assertFalse($user->validate('username'));
        $user->username = 'test/slash';
        $this->assertFalse($user->validate('username'));
        $user->username = '123890AßäöüÄÖÜĆ_-@#$%^&*()[]{}+=<>:;,.?!|~"\'\\';
        $this->assertFalse($user->validate('username'));
        $user->username = 'user@example.com';
        $this->assertTrue($user->validate('username'));
        $user->username = 'user-name';
        $this->assertTrue($user->validate('username'));
        $user->username = 'user_name';
        $this->assertTrue($user->validate('username'));
        $user->username = 'user.name';
        $this->assertTrue($user->validate('username'));
    }

}
