<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2015 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
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
