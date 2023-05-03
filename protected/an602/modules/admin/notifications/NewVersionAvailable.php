<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\admin\notifications;

use Yii;
use yii\helpers\Url;
use yii\bootstrap\Html;
use an602\modules\notification\components\BaseNotification;
use an602\modules\admin\libs\An602API;

/**
 * An602UpdateNotification
 *
 * Notifies about new An602 Version
 *
 * @since 0.11
 */
class NewVersionAvailable extends BaseNotification
{

    /**
     * @inheritdoc
     */
    public $moduleId = 'admin';

    /**
     * @inheritdoc
     */
    public $requireOriginator = false;

    /**
     * @inheritdoc
     */
    public $requireSource = false;

    /**
     * @inheritdoc
     */
    public function getUrl()
    {
        return Url::to(['/admin/information/about']);
    }

    /**
     * @inheritdoc
     */
    public function category()
    {
        return new AdminNotificationCategory;
    }

    /**
     * @inheritdoc
     */
    public function getLatestAn602Version()
    {
        return An602API::getLatestAn602Version();
    }

    /**
     * @inheritdoc
     */
    public function html()
    {
        return Yii::t('AdminModule.notification', "There is a new An602 Version ({version}) available.", ['version' => Html::tag('strong', $this->getLatestAn602Version())]);
    }

}

?>
