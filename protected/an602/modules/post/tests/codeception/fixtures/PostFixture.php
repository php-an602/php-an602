<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2015 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\post\tests\codeception\fixtures;

use tests\codeception\_support\ContentActiveFixture;

class PostFixture extends ContentActiveFixture
{
    public $modelClass = 'an602\modules\post\models\Post';
    public $dataFile = '@modules/post/tests/codeception/fixtures/data/post.php';
}
