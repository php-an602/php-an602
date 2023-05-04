<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2015 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\user\tests\codeception\fixtures;

use yii\test\ActiveFixture;

class UserPasswordFixture extends ActiveFixture
{

    public $modelClass = 'an602\modules\user\models\Password';
    public $dataFile = '@modules/user/tests/codeception/fixtures/data/user_password.php';

}
