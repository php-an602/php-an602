<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

use an602\libs\Html;
use an602\modules\admin\widgets\ModuleControls;
use an602\modules\admin\widgets\ModuleStatus;
use an602\modules\marketplace\models\Module;
use an602\modules\marketplace\widgets\ModuleInstallActionButtons;
use an602\modules\ui\icon\widgets\Icon;

/* @var Module $module */
?>
<div class="card-panel">
    <?= ModuleStatus::widget(['module' => $module]) ?>
    <div class="card-header">
        <?= Html::img($module->image, [
            'class' => 'media-object img-rounded',
            'data-src' => 'holder.js/94x94',
            'alt' => '94x94',
            'style' => 'width:94px;height:94px',
        ]) ?>
        <?= ModuleControls::widget(['module' => $module]) ?>
    </div>
    <div class="card-body">
        <div class="card-title"><?= $module->name . ($module->featured ? ' ' . Icon::get('star')->color('info') : '') ?></div>
        <div><?= $module->latestVersion ?></div>
        <div><?= $module->description ?></div>
    </div>
    <?= ModuleInstallActionButtons::widget(['module' => $module]) ?>
</div>