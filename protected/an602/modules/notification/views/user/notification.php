<?php

use an602\modules\notification\models\forms\NotificationSettings;
use an602\modules\notification\widgets\UserInfoWidget;
use an602\modules\ui\form\widgets\ActiveForm;
use an602\modules\ui\view\components\View;
use yii\helpers\Url;

/* @var $this View */
/* @var $model NotificationSettings */
?>

<div class="panel-heading">
    <?= Yii::t('NotificationModule.base', '<strong>Notification</strong> Settings'); ?>
</div>
<div class="panel-body">
    <div class="help-block">
        <?= Yii::t('NotificationModule.base', 'Notifications are sent instantly to you to inform you about new activities in your network.'); ?>
        <br/>
        <?= Yii::t('NotificationModule.base', 'This view allows you to configure your notification settings by selecting the desired targets for the given notification categories.'); ?>
    </div>

    <?= UserInfoWidget::widget() ?>

    <?php $form = ActiveForm::begin(['acknowledge' => true]); ?>

    <?= an602\modules\notification\widgets\NotificationSettingsForm::widget([
        'model' => $model,
        'form' => $form
    ]) ?>

    <br/>
    <button type="submit" class="btn btn-primary" data-ui-loader><?= Yii::t('base', 'Save'); ?></button>
    <?php if ($model->isUserSettingLoaded()): ?>
        <a href="#" class="btn btn-default pull-right" data-action-click="post"
           data-action-url="<?= Url::to(['reset']) ?>"
           data-ui-loader><?= Yii::t('ActivityModule.base', 'Reset to defaults') ?></a>
    <?php endif; ?>
    <?php ActiveForm::end(); ?>
</div>
