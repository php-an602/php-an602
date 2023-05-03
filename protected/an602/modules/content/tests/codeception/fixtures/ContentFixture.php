<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\content\tests\codeception\fixtures;

use yii\test\ActiveFixture;

class ContentFixture extends ActiveFixture
{

    public $modelClass = 'an602\modules\content\models\Content';
    public $dataFile = '@modules/content/tests/codeception/fixtures/data/content.php';
    
    public $depends = [
        'an602\modules\content\tests\codeception\fixtures\ContentContainerFixture',
        'an602\modules\content\tests\codeception\fixtures\ContentTagFixture',
        'an602\modules\content\tests\codeception\fixtures\ContentTagRelationFixture',
        'an602\modules\content\tests\codeception\fixtures\ContentContainerTagFixture',
        'an602\modules\content\tests\codeception\fixtures\ContentContainerTagRelationFixture',
        'an602\modules\post\tests\codeception\fixtures\PostFixture',
        'an602\modules\comment\tests\codeception\fixtures\CommentFixture',
        'an602\modules\like\tests\codeception\fixtures\LikeFixture'
    ];

}
