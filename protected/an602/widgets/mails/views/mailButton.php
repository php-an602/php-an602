<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

/* @var $color string */
/* @var $text string */
/* @var $url string */

?>
<td width="auto"  align="center" valign="middle" height="32" 
    style="background-color:<?= $color ?>; border-radius:5px; background-clip: padding-box;font-size:14px; font-family:Open Sans, Arial,Tahoma, Helvetica, sans-serif; text-align:center;font-weight: 600; padding-left:30px; padding-right:30px; padding-top: 5px; padding-bottom: 5px;">                   
    <span>
        <a href="<?= $url; ?>" style="text-decoration: none; color: <?= Yii::$app->view->theme->variable('button-text-color', '#fff'); ?>; font-weight: 300;">
            <?= $text ?>
        </a>
    </span>
</td>
