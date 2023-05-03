<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\modules\content\tests\codeception\fixtures;

use an602\modules\content\models\ContentContainerModuleState;
use yii\test\ActiveFixture;

class ContentContainerModuleFixture extends ActiveFixture
{
    public $modelClass = ContentContainerModuleState::class;
    public $dataFile = '@modules/content/tests/codeception/fixtures/data/contentcontainer_module.php';
}
