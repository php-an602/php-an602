<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\live\tests\codeception\fixtures;

use an602\modules\live\models\Live;
use yii\test\ActiveFixture;

class LiveFixture extends ActiveFixture
{

    public $modelClass = Live::class;
    public $dataFile = '@live/tests/codeception/fixtures/data/live.php';

}
