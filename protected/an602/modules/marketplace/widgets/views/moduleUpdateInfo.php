<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

use an602\modules\ui\icon\widgets\Icon;

/* @var string $class */
/* @var string $icon */
/* @var string $info */
/* @var string $link */
?>
<div class="row directory-filters-footer <?= $class ?>">
    <div class="col-md-8 col-xs-12">
        <?= Icon::get($icon, ['htmlOptions' => ['class' => 'filter-footer-icon']]) ?>
        <strong><?= $info ?></strong>
    </div>
    <div class="col-md-4 col-xs-12 text-right">
        <?= $link ?>
    </div>
</div>