<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
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

