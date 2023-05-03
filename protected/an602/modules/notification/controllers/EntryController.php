<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\notification\controllers;

use an602\modules\content\models\Content;
use Yii;
use yii\base\Exception;
use yii\console\Response;
use yii\db\IntegrityException;
use yii\web\HttpException;
use an602\components\Controller;
use an602\components\behaviors\AccessControl;
use an602\modules\notification\models\Notification;
use an602\components\access\ControllerAccess;

/**
 * EntryController
 *
 * @since 0.5
 */
class EntryController extends Controller
{

    /**
     * @inheritdoc
     */
    public function getAccessRules()
    {
        return [
            [ControllerAccess::RULE_LOGGED_IN_ONLY]
        ];
    }

    /**
     * Redirects to the target URL of the given notification
     * @param int $id
     * @param int|null $cId
     * @return EntryController|Response|\yii\web\Response
     * @throws Exception
     * @throws HttpException
     * @throws IntegrityException
     * @throws \Throwable
     */
    public function actionIndex($id, $cId = null)
    {
        $notificationModel = Notification::findOne(['id' => $id, 'user_id' => Yii::$app->user->id]);

        if($notificationModel) {
            $notification = $notificationModel->getBaseModel();

            if(!$notification) {
                throw new HttpException(404, Yii::t('NotificationModule.base','The requested content is not valid or was removed!'));
            }

            $url = $notification->getUrl();

            if ($notification->markAsSeenOnClick) {
                $notification->markAsSeen();
            }
        } else {
            $url = $this->getContentUrl($cId);
        }

        if(!$url) {
            throw new HttpException(404, Yii::t('NotificationModule.base','The requested content is not valid or was removed!'));
        }

        return $this->redirect($url);
    }

    /**
     * @param null $cId
     * @return string|null
     * @throws HttpException
     * @throws \Throwable
     * @throws Exception
     */
    private function getContentUrl($cId = null) {
        if($cId === null) {
            return null;
        }

        $content = Content::findOne(['id' => $cId]);

        if(!$content) {
            return null;
        }

        if(!$content->canView()) {
            throw new HttpException(403);
        }

        return $content->getUrl();
    }

}
