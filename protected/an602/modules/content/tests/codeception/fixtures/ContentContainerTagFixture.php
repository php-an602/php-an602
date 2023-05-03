<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\modules\content\tests\codeception\fixtures;

use an602\modules\content\models\ContentContainerTag;
use yii\test\ActiveFixture;

class ContentContainerTagFixture extends ActiveFixture
{
    public $modelClass = ContentContainerTag::class;
    public $dataFile = '@modules/content/tests/codeception/fixtures/data/contentcontainer_tag.php';
}