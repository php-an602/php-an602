<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2021 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 */

use an602\modules\ui\view\helpers\ThemeHelper;

/* @var $content string */
?>
<div class="<?php if (ThemeHelper::isFluid()): ?>container-fluid<?php else: ?>container<?php endif; ?> container-cards container-modules">
    <div class="row">
        <div class="col-lg-12">
            <?= $content; ?>
        </div>
    </div>
</div>
