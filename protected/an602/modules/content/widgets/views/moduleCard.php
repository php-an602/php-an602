<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

use an602\components\Module;
use an602\libs\Html;
use an602\modules\content\components\ContentContainerActiveRecord;
use an602\modules\content\widgets\ModuleActionButtons;

/* @var Module $module */
/* @var ContentContainerActiveRecord $contentContainer */
?>
<div class="card-panel">
    <div class="card-header">
        <?= Html::img($module->getImage(), [
            'class' => 'media-object img-rounded',
            'data-src' => 'holder.js/94x94',
            'alt' => '94x94',
            'style' => 'width:94px;height:94px',
        ]) ?>
    </div>
    <div class="card-body">
        <div class="card-title"><?= $module->getContentContainerName($contentContainer) ?></div>
    </div>
    <?= ModuleActionButtons::widget([
        'module' => $module,
        'contentContainer' => $contentContainer,
    ]) ?>
</div>
