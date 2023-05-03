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
 * Date: 14.06.2017
 * Time: 14:18
 */

namespace an602\modules\content\tests\codeception\unit;


use an602\libs\BasePermission;
use an602\modules\content\components\ContentActiveRecord;
use an602\modules\content\permissions\ManageContent;
use an602\modules\post\models\Post;

class TestContentManagePermission extends ManageContent
{

}
