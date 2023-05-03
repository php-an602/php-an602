<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

use yii\helpers\Html;

/* @var $this \an602\modules\ui\view\components\View */
/* @var $options array */
/* @var $title string */
/* @var $value boolean */
/* @var $checked boolean */
/* @var $iconInActive boolean */
/* @var $iconActive boolean */
?>

<?= Html::beginTag('a', $options) ?>
<i class="fa  <?= ($checked) ? $iconActive : $iconInActive ?>"></i> <?= $title ?>
<?= Html::endTag('a') ?>

