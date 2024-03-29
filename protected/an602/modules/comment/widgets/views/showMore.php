<?php

use an602\modules\comment\widgets\ShowMore;
use an602\widgets\Link;

/* @var $text string */
/* @var $showMoreUrl string */
/* @var $type string */
?>
<div class="showMore">
    <?php if ($type == ShowMore::TYPE_NEXT) : ?>
        <hr class="comment-separator">
    <?php endif; ?>
    <?= Link::withAction($text, 'comment.showMore', $showMoreUrl)->options(['data-type' => $type]) ?>
</div>
