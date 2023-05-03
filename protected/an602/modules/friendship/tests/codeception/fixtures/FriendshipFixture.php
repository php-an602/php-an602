<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\friendship\tests\codeception\fixtures;

use yii\test\ActiveFixture;

class FriendshipFixture extends ActiveFixture
{
    public $modelClass = 'an602\modules\friendship\models\FriendShip';
    public $dataFile = '@modules/friendship/tests/codeception/fixtures/data/friendship.php';
}
