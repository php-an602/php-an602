<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2016 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\directory;

/**
 * Deprecated Directory Base Module
 * @deprecated since 1.9 
 */
class Module extends \an602\components\Module
{

    /**
     * @deprecated since 1.11 will be removed with v1.12
     */
    public $isCoreModule = false;
    public $memberListSortField = 'profile.lastname';
    public $pageSize = 25;
    public $active = false;
    public $guestAccess = true;
    public $showUserProfilePosts = true;

}
