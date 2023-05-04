<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2021 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
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