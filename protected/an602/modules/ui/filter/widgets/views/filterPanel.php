<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

use an602\modules\ui\filter\widgets\FilterBlock;

/* @var $this \an602\modules\ui\view\components\View */
/* @var $span integer */
/* @var $blocks [] */

$colSpan = $span <= 4 ? 12 / $span : 6;

?>

<div class="filter-panel col-md-<?= $colSpan?>">
    <?php foreach ($blocks as $block): ?>
        <?= FilterBlock::widget($block)?>
    <?php endforeach; ?>
</div>
