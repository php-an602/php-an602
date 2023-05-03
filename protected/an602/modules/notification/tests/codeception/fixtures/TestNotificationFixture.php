<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\notification\tests\codeception\fixtures;

use yii\test\ActiveFixture;

class TestNotificationFixture extends ActiveFixture
{

    public $modelClass = 'an602\modules\notification\models\Notification';
    public $dataFile = '@modules/notification/tests/codeception/fixtures/data/testnotification.php';
    
    public $depends = [
        'an602\modules\user\tests\codeception\fixtures\GroupUserFixture'
    ];

}
