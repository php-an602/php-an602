<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\admin\jobs;

use an602\modules\admin\libs\An602API;
use an602\modules\admin\Module;
use an602\modules\admin\notifications\NewVersionAvailable;
use an602\modules\queue\ActiveJob;
use an602\modules\user\models\Group;
use Yii;


/**
 * CheckForNewVersion checks for new An602 version and sends a notification to
 * the administrators
 *
 * @since 1.2
 * @author Luke
 */
class CheckForNewVersion extends ActiveJob
{

    /**
     * @inheritdoc
     */
    public function run()
    {
        /** @var Module $adminModule */
        $adminModule = Yii::$app->getModule('admin');

        if (!$adminModule->dailyCheckForNewVersion || !Yii::$app->params['an602']['apiEnabled']) {
            return;
        }

        $latestVersion = An602API::getLatestAn602Version();

        if (!empty($latestVersion)) {

            $adminUserQuery = Group::getAdminGroup()->getUsers();

            $latestNotifiedVersion = $adminModule->settings->get('lastVersionNotify');
            $adminsNotified = !($latestNotifiedVersion == "" || version_compare($latestVersion, $latestNotifiedVersion, ">"));
            $newVersionAvailable = (version_compare($latestVersion, Yii::$app->version, ">"));

            $updateNotification = new NewVersionAvailable();

            // Cleanup existing notifications
            if (!$newVersionAvailable || ($newVersionAvailable && !$adminsNotified)) {
                foreach ($adminUserQuery->all() as $admin) {
                    $updateNotification->delete($admin);
                }
            }

            // Create new notification
            if ($newVersionAvailable && !$adminsNotified) {
                $updateNotification->sendBulk($adminUserQuery);
                $adminModule->settings->set('lastVersionNotify', $latestVersion);
            }
        }
    }

}
