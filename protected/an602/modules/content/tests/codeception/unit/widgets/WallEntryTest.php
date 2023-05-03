<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\content\tests\codeception\unit\widgets;

/**
 * @inheritdoc
 */
class WallEntryTest extends \an602\modules\content\widgets\WallEntry
{
    
     public $wallEntryLayout = "@an602/modules/content/tests/codeception/unit/widgets/views/wallEntry.php";
     
    /**
     * @inheritdoc
     */
    public function run()
    {
        return '<div>Wallentry:'.$this->contentObject->message.'</div>';
    }

}
