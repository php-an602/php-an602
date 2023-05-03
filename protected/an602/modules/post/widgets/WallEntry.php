<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\post\widgets;

use an602\modules\content\widgets\stream\WallStreamEntryWidget;
use an602\modules\post\models\Post;
use an602\modules\post\Module;
use Yii;

/**
 * @inheritdoc
 */
class WallEntry extends WallStreamEntryWidget
{
    /**
     * Route to create a content
     *
     * @var string
     */
    public $createRoute = '/post/post/create-form';

    /**
     * @inheritdoc
     */
    public $editRoute = '/post/post/edit';

    /**
     * @inheritdoc
     */
    public $createFormSortOrder = 100;

    /**
     * @inheritdoc
     */
    public $createFormClass = Form::class;

    /**
     * @inheritdoc
     */
    protected function renderContent()
    {
        /** @var Module $module */
        $module = Yii::$app->getModule('post');

        return $this->render('wallEntry', [
            'post' => $this->model,
            'justEdited' => $this->renderOptions->isJustEdited(), // compatibility for themed legacy views
            'renderOptions' => $this->renderOptions,
            'enableDynamicFontSize' => $module->enableDynamicFontSize
        ]);
    }
}
