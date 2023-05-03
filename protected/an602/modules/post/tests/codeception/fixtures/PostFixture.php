<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\post\tests\codeception\fixtures;

use tests\codeception\_support\ContentActiveFixture;

class PostFixture extends ContentActiveFixture
{
    public $modelClass = 'an602\modules\post\models\Post';
    public $dataFile = '@modules/post/tests/codeception/fixtures/data/post.php';
}
