<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2016 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\notification\widgets;

use Yii;

/**
 * UpdateNotificationCount widget is an LayoutAddon widget for updating the notification count
 * and is only used if pjax is active.
 *
 * @author buddha
 * @since 1.2
 */
class UpdateNotificationCount extends \yii\base\Widget
{

    /**
     * @inheritdoc
     */
    public function run()
    {
        if (Yii::$app->user->isGuest) {
            return;
        }

        return $this->render('updateNotificationCount', [
            'count' => \an602\modules\notification\models\Notification::findUnseen()->count()
        ]);
    }
}
