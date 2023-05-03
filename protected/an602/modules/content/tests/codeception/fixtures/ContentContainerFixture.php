<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\content\tests\codeception\fixtures;

use yii\test\ActiveFixture;

class ContentContainerFixture extends ActiveFixture
{
    public $modelClass = 'an602\modules\content\models\ContentContainer';
    public $dataFile = '@modules/content/tests/codeception/fixtures/data/contentcontainer.php';
    
    public $depends = [
        'an602\modules\content\tests\codeception\fixtures\ContentContainerDefaultPermissionFixture',
        'an602\modules\content\tests\codeception\fixtures\ContentContainerPermissionFixture',
        'an602\modules\content\tests\codeception\fixtures\ContentContainerSettingFixture',
        'an602\modules\content\tests\codeception\fixtures\ContentContainerModuleFixture'
    ];

}
