<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\content\tests\codeception\fixtures;

use yii\test\ActiveFixture;

class ContentContainerSettingFixture extends ActiveFixture
{

    public $modelClass = 'an602\modules\content\models\ContentContainerSetting';
    public $dataFile = '@modules/content/tests/codeception/fixtures/data/contentcontainer_setting.php';

}
