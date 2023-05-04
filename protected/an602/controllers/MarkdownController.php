<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
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
