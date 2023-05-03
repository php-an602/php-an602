<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

use an602\modules\activity\models\MailSummaryForm;

/* @var $model MailSummaryForm */

 ?>

<div class="panel-heading">
    <?= Yii::t('ActivityModule.base', '<strong>E-Mail</strong> Summaries') ?>
</div>
<div class="panel-body">
    <div class="help-block">
        <?= Yii::t('ActivityModule.base', 'E-Mail summaries are sent to inform you about recent activities in the network.') ?><br />
        <?= Yii::t('ActivityModule.base', 'On this page you can configure the contents and the interval of these e-mail updates.') ?><br />
    </div>

    <?= $this->render('@activity/views/mailSummaryForm', ['model' => $model]) ?>
</div>

