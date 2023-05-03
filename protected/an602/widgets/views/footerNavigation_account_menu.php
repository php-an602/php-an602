<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

use an602\libs\Html;
use an602\modules\ui\menu\MenuLink;

/* @var $this \an602\modules\ui\view\components\View */
/* @var $entries MenuLink[] */
/* @var $options array */
/* @var $menu \an602\widgets\FooterMenu */


/**
 * NOTE: This template is used only in mobile view ports!
 */

?>

<?php if (!empty($entries)): ?>
    <li class="divider visible-sm visible-xs"></li>
    <?php foreach ($entries as $k => $entry): ?>
        <?php if ($entry instanceof MenuLink): ?>
            <li class="visible-sm visible-xs footer-nav-entry">
                <?= Html::a($entry->getIcon() . ' ' . $entry->getLabel(), $entry->getUrl(), $entry->getHtmlOptions()); ?>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>
