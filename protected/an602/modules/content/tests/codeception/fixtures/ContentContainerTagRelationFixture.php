<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2021 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 *
 */

namespace an602\modules\content\tests\codeception\fixtures;

use an602\modules\content\models\ContentContainerTagRelation;
use yii\test\ActiveFixture;

class ContentContainerTagRelationFixture extends ActiveFixture
{
    public $modelClass = ContentContainerTagRelation::class;
    public $dataFile = '@modules/content/tests/codeception/fixtures/data/contentcontainer_tag_relation.php';
}
