<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

use an602\libs\Html;
use an602\modules\ui\widgets\DirectoryFilters;
use yii\helpers\Url;

/* @var $directoryFilters DirectoryFilters */
?>

<?= Html::beginForm(Url::to([$directoryFilters->pageUrl]), 'get', ['class' => 'form-search']); ?>
    <?php if ($directoryFilters->paginationUsed) : ?>
        <?= Html::hiddenInput('page', '1'); ?>
    <?php endif; ?>
    <div class="row">
        <?= $directoryFilters->renderFilters() ?>
    </div>
<?= Html::endForm(); ?>