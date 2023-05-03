<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

use yii\helpers\Html;

/* @var $container \an602\modules\content\components\ContentContainerActiveRecord */
/* @var $url string */

?>

<a href="<?= $url ?>">
    <div>
        <img src="<?= $container->getProfileImage()->getUrl("", true); ?>"
             width="50"
             height="50"
             alt=""
             title="<?= Html::encode($container->displayName) ?>"
             style="border-radius: 4px;"
             border="0" hspace="0" vspace="0"/>
    </div>
</a>