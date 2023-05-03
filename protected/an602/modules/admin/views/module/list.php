<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

use an602\assets\CardsAsset;
use an602\modules\admin\widgets\ModuleFilters;
use an602\modules\admin\widgets\Modules;
use an602\modules\ui\icon\widgets\Icon;
use an602\modules\ui\view\components\View;
use an602\widgets\Button;

/* @var $this View */

CardsAsset::register($this);
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <?= Yii::t('AdminModule.base', '<strong>Module</strong> Administration'); ?>
        <?= Button::asLink(Icon::get('cog'))
            ->action('ui.modal.load', ['/admin/module/module-settings'])
            ->cssClass('module-settings-icon')
            ->tooltip(Yii::t('AdminModule.base', 'Settings')) ?>
    </div>
    <div class="panel-body">
        <?= ModuleFilters::widget(); ?>
    </div>
</div>

<?= Modules::widget() ?>
