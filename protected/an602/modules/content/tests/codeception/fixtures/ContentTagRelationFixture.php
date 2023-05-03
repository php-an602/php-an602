<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\modules\content\tests\codeception\fixtures;

use an602\modules\content\models\ContentTag;
use an602\modules\content\models\ContentTagRelation;
use yii\test\ActiveFixture;

class ContentTagRelationFixture extends ActiveFixture
{
    public $modelClass = ContentTagRelation::class;
    public $dataFile = '@modules/content/tests/codeception/fixtures/data/content_tag_relation.php';
}
