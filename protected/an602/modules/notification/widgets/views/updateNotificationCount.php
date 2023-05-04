<?php
use an602\libs\Html;

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 */
?>

<script <?= Html::nonce() ?>>
    $(document).one('an602:ready', function() {
        if(an602 && an602.modules.notification && an602.modules.notification.menu) {
            an602.modules.notification.menu.updateCount(<?= $count ?>);
        }
    });
</script>