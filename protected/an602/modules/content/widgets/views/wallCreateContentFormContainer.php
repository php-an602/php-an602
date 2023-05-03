<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2022 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

use an602\modules\content\components\ContentContainerActiveRecord;
use an602\modules\content\widgets\WallCreateContentMenu;
use an602\modules\content\assets\ContentFormAsset;

/* @var $contentContainer ContentContainerActiveRecord */
/* @var $formClass string */

ContentFormAsset::register($this);
?>

<?= WallCreateContentMenu::widget(['contentContainer' => $contentContainer]) ?>

<?php if ($formClass) : ?>
    <?= $formClass::widget(['contentContainer' => $contentContainer]) ?>
<?php endif; ?>