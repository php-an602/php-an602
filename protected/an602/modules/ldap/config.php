<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2019 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

use an602\modules\admin\widgets\AuthenticationMenu;
use an602\modules\ldap\Events;
use an602\modules\user\authclient\Collection;
use an602\components\console\Application;

/** @noinspection MissedFieldInspection */
return [
    'id' => 'ldap',
    'class' => \an602\modules\ldap\Module::class,
    'isCoreModule' => true,
    'consoleControllerMap' => [
        'ldap' => 'an602\modules\ldap\commands\LdapController'
    ],
    'events' => [
        [AuthenticationMenu::class, AuthenticationMenu::EVENT_INIT, [Events::class, 'onAuthenticationMenu']],
        [Collection::class, Collection::EVENT_BEFORE_CLIENTS_SET, [Events::class, 'onAuthClientCollectionSet']],
    ]
];
?>
