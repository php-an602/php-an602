<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

/**
 * Created by PhpStorm.
 * User: buddha
 * Date: 01.10.2017
 * Time: 15:15
 */

namespace an602\modules\notification\targets;


use an602\modules\notification\components\BaseNotification;
use an602\modules\user\models\User;

interface MobileTargetProvider
{
    /**
     * @param BaseNotification $notification
     * @param User $user
     * @return boolean
     */
    public function handle(BaseNotification $notification, User $user);

    /**
     * @param User|null $user
     * @return boolean
     */
    public function isActive(User $user = null);
}
