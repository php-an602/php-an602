<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2021 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 */

use an602\modules\ui\form\widgets\ActiveForm;
use tests\codeception\models\TestTabbedFormModel;

/* @var $form ActiveForm */
/* @var $tabbedForm TestTabbedFormModel */
?>

<?= $form->field($tabbedForm, 'countryId')->textInput() ?>
<?= $form->field($tabbedForm, 'stateId')->textInput() ?>
<?= $form->field($tabbedForm, 'cityId')->textInput() ?>
