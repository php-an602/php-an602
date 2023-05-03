<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\tests\codeception\fixtures;

use yii\test\ActiveFixture;

class GroupPermissionFixture extends ActiveFixture
{

    public $modelClass = 'an602\modules\user\models\GroupPermission';
    public $dataFile = '@modules/user/tests/codeception/fixtures/data/group_permission.php';

}
