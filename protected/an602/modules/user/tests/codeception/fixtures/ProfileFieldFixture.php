<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\tests\codeception\fixtures;

use yii\test\ActiveFixture;

class ProfileFieldFixture extends ActiveFixture
{
    public $tableName = 'profile_field';
    public $modelClass = 'an602\modules\user\models\ProfileField';
    public $dataFile = '@modules/user/tests/codeception/fixtures/data/profile_field.php';

    public $depends = [
        'an602\modules\user\tests\codeception\fixtures\ProfileFieldCategoryFixture'
    ];
}
