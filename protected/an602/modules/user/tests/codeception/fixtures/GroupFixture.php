<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\tests\codeception\fixtures;

use an602\modules\space\tests\codeception\fixtures\SpaceFixture;
use yii\test\ActiveFixture;

class GroupFixture extends ActiveFixture
{

    public $modelClass = 'an602\modules\user\models\Group';
    public $dataFile = '@modules/user/tests/codeception/fixtures/data/group.php';
    
    public $depends = [
        UserFixture::class,
        SpaceFixture::class
    ];

}
