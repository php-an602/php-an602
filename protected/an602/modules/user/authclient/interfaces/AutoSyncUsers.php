<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\authclient\interfaces;

/**
 * AutoSyncUsers interface adds the possiblity to automatically update/create users via AuthClient.
 * If this interface is implemented the cron will hourly execute the authclient's 
 * syncronization method.
 * 
 * @author luke
 */
interface AutoSyncUsers
{

    public function syncUsers();
}
