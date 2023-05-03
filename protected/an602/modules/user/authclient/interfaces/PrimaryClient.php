<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\authclient\interfaces;

/**
 * PrimaryClient authclient interface
 * 
 * It's not possible to have two primary auth clients at the same time.
 * E.g. LDAP and Password
 * 
 * @author luke
 */
interface PrimaryClient
{

    /**
     * Returns the user model of this auth client
     * 
     * @since 1.2.2
     * @return \an602\modules\user\models\User
     */
    public function getUser();
}
