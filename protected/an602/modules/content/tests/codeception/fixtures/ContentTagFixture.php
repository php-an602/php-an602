<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\modules\content\tests\codeception\fixtures;

use an602\modules\content\models\ContentTag;
use yii\test\ActiveFixture;

class ContentTagFixture extends ActiveFixture
{
    public $modelClass = ContentTag::class;
    public $dataFile = '@modules/content/tests/codeception/fixtures/data/content_tag.php';
}
