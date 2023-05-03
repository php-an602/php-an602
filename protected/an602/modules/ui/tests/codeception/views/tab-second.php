<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

use an602\modules\ui\form\widgets\ActiveForm;
use tests\codeception\models\TestTabbedFormModel;

/* @var $form ActiveForm */
/* @var $tabbedForm TestTabbedFormModel */
?>

<?= $form->field($tabbedForm, 'countryId')->textInput() ?>
<?= $form->field($tabbedForm, 'stateId')->textInput() ?>
<?= $form->field($tabbedForm, 'cityId')->textInput() ?>
