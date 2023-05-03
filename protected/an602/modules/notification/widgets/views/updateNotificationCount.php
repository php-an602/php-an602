<?php
use an602\libs\Html;

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */
?>

<script <?= Html::nonce() ?>>
    $(document).one('an602:ready', function() {
        if(an602 && an602.modules.notification && an602.modules.notification.menu) {
            an602.modules.notification.menu.updateCount(<?= $count ?>);
        }
    });
</script>