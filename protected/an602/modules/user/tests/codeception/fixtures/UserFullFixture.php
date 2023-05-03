<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\modules\user\tests\codeception\fixtures;

use an602\modules\content\tests\codeception\fixtures\ContentContainerFixture;
use yii\test\ActiveFixture;

class UserFullFixture extends ActiveFixture
{

    public $tableName = 'user_mentioning';
    public $depends = [
        UserFixture::class,
        UserProfileFixture::class,
        ContentContainerFixture::class,
        UserPasswordFixture::class,
        UserFollowFixture::class,
        InviteFixture::class,
        GroupSpaceFixture::class,
        GroupFixture::class,
    ];

}
