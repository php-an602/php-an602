<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

use an602\libs\Html;

/* @var $this \an602\modules\ui\view\components\View */
/* @var $title string */
/* @var $filters array */
/* @var $options array */

?>

<?= Html::beginTag('div', $options) ?>
    <strong><?= $title ?></strong>
    <ul class="filter-list">

        <?php foreach ($filters as $filter): ?>
            <li>
                <?= call_user_func($filter['class'].'::widget', $filter) ?>
            </li>
        <?php endforeach; ?>

    </ul>
<?= Html::endTag('div') ?>
