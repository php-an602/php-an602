<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.an602.org/en/licences
 */

use an602\components\access\ControllerAccess;
use an602\libs\Html;
use yii\helpers\Url;

?>

<div class="panel panel-danger panel-invalid">
    <div class="panel-heading"><?= Yii::t('AdminModule.base', '<strong>Maintenance</strong> Mode'); ?></div>
    <div class="panel-body">
        <p><?= ControllerAccess::getMaintenanceModeWarningText('<br>') ?></p>
        <br>
        <?php if (Yii::$app->user->isAdmin()): ?>
            <?= Html::a(Yii::t('AdminModule.base', 'Settings'), Url::toRoute(['/admin/setting']), ['class' => 'btn btn-danger']); ?>
        <?php endif; ?>
    </div>
</div>
