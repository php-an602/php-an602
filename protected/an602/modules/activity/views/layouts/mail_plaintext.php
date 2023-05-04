<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 */

/* @var $this \yii\web\View */
/* @var $space Space */
/* @var $url string */
/* @var $contentContainer ContentContainerActiveRecord */
/* @var $html string */
/* @var $text string */
/* @var $originator User */

use an602\modules\content\components\ContentContainerActiveRecord;
?>

---

<?= $content ?>
<?php if (!empty($space)) : ?>
    (<?= Yii::t('ActivityModule.base', 'via') ?> <?= $space->displayName ?>)
<?php endif; ?>

<?php if ($url != '') : ?>
    <?= Yii::t('ActivityModule.base', 'See online:') ?> <?= urldecode($url) ?>
<?php endif; ?>
