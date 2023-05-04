<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
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
