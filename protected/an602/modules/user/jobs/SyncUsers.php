<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\jobs;

use Yii;
use an602\modules\queue\ActiveJob;
use an602\modules\user\authclient\interfaces\AutoSyncUsers;

/**
 * AutoSyncUsers
 *
 * When a authclient provider implements the AutoSyncUser interface the syncUsers
 * method is called to fetch and update users.
 * 
 * @since 1.3
 * @author Luke
 */
class SyncUsers extends ActiveJob
{

    /**
     * @inheritdoc
     */
    public function run()
    {
        foreach (Yii::$app->authClientCollection->getClients() as $authClient) {
            if ($authClient instanceof AutoSyncUsers) {
                /**
                 * @var AutoSyncUsers $authClient 
                 */
                $authClient->syncUsers();
            }
        }
    }

}
