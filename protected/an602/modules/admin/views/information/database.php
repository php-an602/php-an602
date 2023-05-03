<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

use an602\libs\Html;

/**
 * @var $this \an602\modules\ui\view\components\View
 * @var $databaseName string
 * @var $migrate string
 * @var $rebuildSearchRunning boolean
 */
?>
<div>
    <p>
        <?php if ($rebuildSearchRunning): ?>
            <div class="alert alert-info"><?= Yii::t('AdminModule.information', 'Search index rebuild in progress.'); ?></div>
        <?php else: ?>
            <?= Html::a('Rebuild search index', ['/admin/information/database', 'rebuildSearch' => 1], ['class' => 'btn btn-primary pull-right', 'data-method' => 'post', 'data-ui-loader' => '']); ?>
        <?php endif; ?>

        <?= Yii::t('AdminModule.information', 'The current main An602 database name is ') ?>
        <i><b><?= Html::encode($databaseName) ?></b></i>
    </p>
</div>

<p><?= Yii::t('AdminModule.information', 'Database migration results:'); ?></p>

<div class="well">
    <pre>
        <?= $migrate; ?>
    </pre>
</div>
