<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
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
