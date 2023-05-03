<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\modules\file\tests\codeception\fixtures;

use an602\modules\file\models\File;
use yii\test\ActiveFixture;

class FileFixture extends ActiveFixture
{

    public $modelClass = File::class;
    public $dataFile = '@file/tests/codeception/fixtures/data/file.php';

}
