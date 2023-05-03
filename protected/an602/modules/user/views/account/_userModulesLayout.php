<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

use an602\modules\user\widgets\AccountMenu;
use an602\widgets\FooterMenu;

/* @var string $content */
?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?= AccountMenu::widget() ?>
        </div>
        <div class="col-md-9">
            <?= $content ?>
            <?= FooterMenu::widget(['location' => FooterMenu::LOCATION_FULL_PAGE]); ?>
        </div>
    </div>
</div>
