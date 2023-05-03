<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\modules\file\tests\codeception\fixtures;

use an602\modules\file\models\FileHistory;
use yii\test\ActiveFixture;

class FileHistoryFixture extends ActiveFixture
{

    public $modelClass = FileHistory::class;
    public $dataFile = '@file/tests/codeception/fixtures/data/file-history.php';

}
