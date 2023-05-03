<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2016 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\notification\widgets;

use Yii;
use an602\widgets\JsWidget;
use an602\modules\notification\controllers\ListController;
use yii\helpers\Url;

/**
 * Notificaiton overview widget.
 *
 * @author buddha
 * @since 1.1
 */
class Overview extends JsWidget
{
    public $id = 'notification_widget';

    public $jsWidget = 'notification.NotificationDropDown';

    public function init()
    {
        $this->view->registerJsConfig('notification', [
            'icon' => $this->view->theme->getBaseUrl().'/ico/notification-o.png',
            'loadEntriesUrl' => Url::to(['/notification/list']),
            'sendDesktopNotifications' => boolval(Yii::$app->notification->getDesktopNoficationSettings(Yii::$app->user->getIdentity())),
            'text' =>  [
                'placeholder' => Yii::t('NotificationModule.base', 'There are no notifications yet.')
            ]
        ]);

        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        if (Yii::$app->user->isGuest) {
            return '';
        }

        return $this->render('overview', [
            'options' => $this->getOptions()
        ]);
    }

    public function getAttributes()
    {
        return [
            'id' => 'notification_widget',
            'class' => "btn-group"
        ];
    }

    public function getData()
    {
        return [
            'ui-init' => ListController::getUpdates(),
        ];
    }
}

?>
