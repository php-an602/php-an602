<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\content\notifications;

use an602\modules\notification\components\BaseNotification;
use Yii;
use yii\bootstrap\Html;
use an602\modules\user\models\User;
use an602\libs\Helpers;
use yii\helpers\Json;

/**
 * ContentDeletedNotification is fired when admin deletes a content (e.g. post)
 */
class ContentDeleted extends BaseNotification
{
    /**
     * @inheritdoc
     */
    public $requireSource = false;

    /**
     * @inheritdoc
     */
    public $moduleId = 'content';

    /**
     * @inheritdoc
     */
    public function category()
    {
        return new \an602\modules\content\notifications\ContentCreatedNotificationCategory();
    }

    /**
     * @inheritdoc
     */
    public function html()
    {
        return Yii::t('ContentModule.notifications', 'Your {contentTitle} has been deleted by {displayName} for \'{reason}\'', [
            'displayName' => Html::tag('strong', Html::encode($this->originator->displayName)),
            'contentTitle' => $this->payload['contentTitle'],
            'reason' => $this->payload['reason']
        ]);
    }
}

?>
