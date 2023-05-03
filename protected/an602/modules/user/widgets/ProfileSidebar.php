<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2016 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\widgets;

use an602\widgets\BaseSidebar;

/**
 * ProfileSidebar implements the sidebar for the user profiles.
 * 
 * @since 0.5
 * @author Luke
 */
class ProfileSidebar extends BaseSidebar
{

    /**
     * @var \an602\modules\user\models\User the user this sidebar belongs to
     */
    public $user;

}

?>
