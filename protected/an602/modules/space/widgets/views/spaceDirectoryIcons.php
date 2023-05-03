<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

use an602\modules\space\models\Space;
use an602\widgets\Link;
use yii\helpers\Html;

/* @var $space Space */
/* @var $membersCount int */
/* @var $canViewMembers bool */

$text = ' <span>' . $membersCount . '</span>';
$class = 'fa fa-users';
?>
<?php if ($canViewMembers) : ?>
    <?= Link::withAction($text, 'ui.modal.load', $space->createUrl('/space/membership/members-list'))->cssClass($class) ?>
<?php else: ?>
    <?= Html::tag('span', $text, ['class' => $class]) ?>
<?php endif; ?>