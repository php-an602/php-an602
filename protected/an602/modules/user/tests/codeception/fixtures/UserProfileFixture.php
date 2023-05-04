<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2015 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\user\tests\codeception\fixtures;

use yii\test\ActiveFixture;

class UserProfileFixture extends ActiveFixture
{

    public $modelClass = 'an602\modules\user\models\Profile';
    public $dataFile = '@modules/user/tests/codeception/fixtures/data/profile.php';

    public $depends = [
        'an602\modules\user\tests\codeception\fixtures\ProfileFieldFixture'
    ];

}
