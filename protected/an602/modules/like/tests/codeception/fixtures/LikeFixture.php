<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\like\tests\codeception\fixtures;

use yii\test\ActiveFixture;

class LikeFixture extends ActiveFixture
{

    public $modelClass = 'an602\modules\like\models\Like';
    public $dataFile = '@modules/like/tests/codeception/fixtures/data/like.php';

}
