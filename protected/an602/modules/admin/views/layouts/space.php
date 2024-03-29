<?php
\an602\modules\admin\widgets\AdminMenu::markAsActive('spaces');
?>

<?php $this->beginContent('@admin/views/layouts/main.php') ?>
<div class="panel panel-default">
    <div class="panel-heading"><?= Yii::t('AdminModule.space', '<strong>Manage</strong> spaces'); ?></div>
    <?= \an602\modules\admin\widgets\SpaceMenu::widget(); ?>
    <div class="panel-body">
        <?= $content ?>
    </div>
</div>

<?php $this->endContent(); ?>
