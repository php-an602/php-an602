<?php

use an602\libs\Html;
use an602\modules\content\components\ContentActiveRecord;
use an602\modules\content\models\Content;
use an602\modules\content\widgets\ArchivedIcon;
use an602\modules\content\widgets\HiddenIcon;
use an602\modules\content\widgets\LockCommentsIcon;
use an602\modules\content\widgets\StateBadge;
use an602\modules\content\widgets\stream\WallStreamEntryOptions;
use an602\modules\content\widgets\UpdatedIcon;
use an602\modules\content\widgets\VisibilityIcon;
use an602\modules\content\widgets\WallEntryControls;
use an602\modules\space\models\Space;
use an602\modules\ui\icon\widgets\Icon;
use an602\modules\ui\view\components\View;
use an602\widgets\TimeAgo;

/* @var $this View */
/* @var $model ContentActiveRecord */
/* @var $headImage string */
/* @var $permaLink string */
/* @var $title string */
/* @var $renderOptions WallStreamEntryOptions */

$container = $model->content->container;
?>

<div class="stream-entry-icon-list">
    <?php if ($model->content->isArchived()) : ?>
        <?= ArchivedIcon::getByModel($model) ?>
    <?php elseif ($renderOptions->isPinned($model)) : ?>
        <?= Icon::get('map-pin', ['htmlOptions' => ['class' => 'icon-pin tt', 'title' => Yii::t('ContentModule.base', 'Pinned')]]) ?>
    <?php endif; ?>
    <?= StateBadge::widget(['model' => $model]); ?>
</div>

<!-- since v1.2 -->
<div class="stream-entry-loader"></div>

<!-- start: show wall entry options -->
<?php if (!$renderOptions->isControlsMenuDisabled()) : ?>
    <?= WallEntryControls::widget(['renderOptions' => $renderOptions, 'object' => $model, 'wallEntryWidget' => $this->context]) ?>
<?php endif; ?>
<!-- end: show wall entry options -->


<div class="wall-entry-header-image">
    <?= $headImage ?>
</div>

<div class="wall-entry-header-info media-body">

    <div class="media-heading">
        <?= $title ?>

        <?php if ($renderOptions->isShowContainerInformationInTitle($model)) : ?>
            <span class="viaLink">
                <?= Icon::get('caret-right') ?>
                <?= Html::containerLink($model->content->container) ?>
            </span>
        <?php endif; ?>
    </div>

    <div class="media-subheading">
        <?php if ($renderOptions->isShowAuthorInformationInSubHeadLine($model)) : ?>
            <?= Html::containerLink($model->content->createdBy, ['class' => 'wall-entry-container-link']) ?>
        <?php endif ?>
        <?php if ($renderOptions->isShowContainerInformationInSubTitle($model)) : ?>
            <?php if ($renderOptions->isShowAuthorInformationInSubHeadLine($model)) : ?>
                <?= Icon::get('caret-right') ?>
                <?= Html::containerLink($model->content->container, ['class' => 'wall-entry-container-link']) ?>
            <?php elseif ($model->content->container instanceof Space) : ?>
                <?= Html::containerLink($model->content->container, ['class' => 'wall-entry-container-link']) ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($renderOptions->isShowAuthorInformationInSubHeadLine($model) || $renderOptions->isShowContainerInformationInSubTitle($model)) : ?>
            &middot;
        <?php endif; ?>

        <a href="<?= $permaLink ?>">
            <?= TimeAgo::widget(['timestamp' => $model->content->created_at, 'titlePrefixInfo' => Yii::t('ContentModule.base', 'Created at:') . ' ']) ?>
        </a>

        &middot;

        <div class="wall-entry-icons">
            <?php if ($model->content->isUpdated()) : ?>
                <?= UpdatedIcon::getByDated($model->content->updated_at) ?>
            <?php endif; ?>

            <?= VisibilityIcon::getByModel($model) ?>
            <?= HiddenIcon::getByModel($model) ?>
            <?= LockCommentsIcon::getByModel($model) ?>
        </div>
    </div>
</div>
