<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\space\widgets;

use an602\modules\space\models\Space;
use an602\components\Widget;

/**
 * SpaceTags lists all tags of the Space
 */
class SpaceTags extends Widget
{

    /**
     * @var Space
     */
    public $space;

    /**
     * @inheritDoc
     */
    public function run()
    {
        return $this->render('spaceTags', ['space' => $this->space]);
    }

}

?>
