<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2022 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

use an602\modules\admin\models\forms\GeneralModuleSettingsForm;
use an602\modules\ui\form\widgets\ActiveForm;
use an602\widgets\ModalButton;
use an602\widgets\ModalDialog;

/* @var GeneralModuleSettingsForm $settings */
?>
<?php ModalDialog::begin(['header' => Yii::t('AdminModule.modules', '<strong>General</strong> Settings')]) ?>

    <?php $form = ActiveForm::begin() ?>

    <div class="modal-body">
        <?= $form->field($settings, 'includeBetaUpdates')->checkbox() ?>
    </div>

    <div class="modal-footer">
        <?= ModalButton::submitModal()?>
        <?= ModalButton::cancel()?>
    </div>

    <?php ActiveForm::end() ?>

<?php ModalDialog::end() ?>
