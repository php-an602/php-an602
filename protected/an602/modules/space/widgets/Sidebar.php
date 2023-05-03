<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2016 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\space\widgets;

use an602\widgets\BaseSidebar;

/**
 * Sidebar implements the default space sidebar.
 * 
 * @author Luke
 * @since 0.5
 */
class Sidebar extends BaseSidebar
{

    /**
     * @var \an602\modules\space\models\Space the space this sidebar is in
     */
    public $space;

}
