<?php
\an602\modules\admin\widgets\AdminMenu::markAsActive('settings');
?>

<?php $this->beginContent('@admin/views/layouts/main.php') ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <?= Yii::t('AdminModule.user', '<strong>Settings</strong> and Configuration'); ?>
    </div>
    <?= \an602\modules\admin\widgets\SettingsMenu::widget(); ?>

    <?= $content; ?>
</div>
<?php $this->endContent(); ?>
