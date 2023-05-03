<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

use an602\libs\Html;
use an602\modules\ui\icon\widgets\Icon;
use an602\modules\ui\menu\MenuEntry;

/* @var MenuEntry[] $entries */
/* @var array $options */
?>

<?= Html::beginTag('ul', $options)?>
    <li class="dropdown ">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"
           aria-label="<?= Yii::t('base', 'Toggle stream entry menu'); ?>" aria-haspopup="true">
            <?= Icon::get('dropdownToggle') ?>
        </a>

        <ul class="dropdown-menu pull-right">
            <?php foreach ($entries as $entry) : ?>
                <li>
                    <?= $entry->render() ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </li>
<?= Html::endTag('ul')?>
