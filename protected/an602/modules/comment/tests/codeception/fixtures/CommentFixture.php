<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\comment\tests\codeception\fixtures;

use yii\test\ActiveFixture;

class CommentFixture extends ActiveFixture
{

    public $modelClass = 'an602\modules\comment\models\Comment';
    public $dataFile = '@modules/comment/tests/codeception/fixtures/data/comment.php';

}
