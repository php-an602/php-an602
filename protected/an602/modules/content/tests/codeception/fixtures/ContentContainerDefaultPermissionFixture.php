<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2021 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\content\tests\codeception\fixtures;

use yii\test\ActiveFixture;

class ContentContainerDefaultPermissionFixture extends ActiveFixture
{
    public $modelClass = 'an602\modules\content\models\ContentContainerDefaultPermission';
    public $dataFile = '@modules/content/tests/codeception/fixtures/data/contentcontainer_default_permission.php';
}
