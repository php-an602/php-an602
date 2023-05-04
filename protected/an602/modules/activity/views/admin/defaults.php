<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 */

/* @var $model \an602\modules\notification\models\forms\NotificationSettings */
?>

<div class="panel-body">
    <h4><?= Yii::t('ActivityModule.base', 'E-Mail Summaries') ?></h4>
    <div class="help-block">
        <?= Yii::t('ActivityModule.base', 'E-Mail summaries are sent to users to inform them about recent activities in your network.') ?><br>
        <?= Yii::t('ActivityModule.base', 'On this page you can define the default behavior for your users. These settings can be overwritten by users in their account settings page.') ?>
        <br>
    </div>
    <br>

    <?= $this->render('@activity/views/mailSummaryForm', ['model' => $model]) ?>
</div>
