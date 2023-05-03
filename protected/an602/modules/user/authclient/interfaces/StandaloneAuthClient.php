<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2016 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\authclient\interfaces;

use an602\modules\user\authclient\AuthAction;

/**
 * StandaloneAuthClient allows implementation of custom authclients
 * which not relies on auth handling by AuthAction
 *
 * @see \yii\authclient\AuthAction
 * @since 1.1.2
 * @author Luke
 */
interface StandaloneAuthClient
{

    /**
     * Custom auth action implementation
     * 
     * @param AuthAction $authAction
     * @return \yii\web\Response response instance.
     */
    public function authAction($authAction);
}
