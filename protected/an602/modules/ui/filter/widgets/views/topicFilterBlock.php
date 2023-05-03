<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

use an602\libs\Html;
use an602\modules\topic\widgets\TopicPicker;

/* @var $this \an602\modules\ui\view\components\View */
/* @var $title string */

?>

<?= Html::beginTag('div', $options) ?>
    <strong><?= $title ?></strong>
    <?= TopicPicker::widget([
        'id' => 'stream_filter_topic',
        'name' => 'filter_topic'
    ]); ?>
<?= Html::endTag('div') ?>
