<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2015 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
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
