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
 * Date: 27.07.2017
 * Time: 00:06
 */

namespace an602\tests\codeception\unit\components\access;


use an602\libs\BasePermission;

class AccessTestPermission2 extends BasePermission
{
    public $moduleId = 'test';

    public $id = 'content-test-permission';

}
