<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

/**
 * Created by PhpStorm.
 * User: buddha
 * Date: 24.07.2017
 * Time: 15:56
 */

namespace an602\modules\content\tests\codeception\unit;


use an602\modules\content\models\ContentTag;

class TestTagOtherModule extends ContentTag
{
    public $moduleId = 'otherTest';

    public static function getLabel()
    {
        return 'testCategory';
    }

}
