<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\controllers;

use Yii;
use an602\components\Controller;
use an602\components\behaviors\AccessControl;
use an602\widgets\MarkdownView;

/**
 * MarkdownController provides preview for MarkdownEditorWidget
 *
 * @author luke
 * @since 0.11
 */
class MarkdownController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'acl' => [
                'class' => AccessControl::className(),
            ]
        ];
    }

    public function actionPreview()
    {
        $this->forcePostRequest();

        return MarkdownView::widget(['markdown' => Yii::$app->request->post('markdown')]);
    }
}
