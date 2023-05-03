<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2016 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\authclient;

use an602\modules\user\models\User;
use an602\modules\user\services\AuthClientUserService;
use yii\authclient\ClientInterface;

/**
 * @deprecated since 1.14
 */
class AuthClientHelpers
{
    /**
     * @deprecated since 1.14
     */
    public static function storeAuthClientForUser(ClientInterface $authClient, User $user)
    {
        (new AuthClientUserService($user))->add($authClient);
    }
}
