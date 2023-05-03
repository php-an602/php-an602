<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

/* @var $this \an602\modules\ui\view\components\View */

use an602\modules\topic\widgets\TopicPicker;

?>

<?= TopicPicker::widget([
    'id' => 'stream-topic-picker',
    'name' => 'stream-topic-picker',
    'addOptions' => false
])
?>
