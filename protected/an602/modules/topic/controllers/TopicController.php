<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\modules\topic\controllers;


use an602\modules\content\components\ContentContainerController;
use an602\modules\content\models\Content;
use an602\modules\topic\models\forms\ContentTopicsForm;
use an602\modules\topic\widgets\TopicPicker;
use Yii;
use yii\web\HttpException;

class TopicController extends ContentContainerController
{
    /**
     * @inheritdoc
     */
    public $requireContainer = false;

    /**
     * @inheritdoc
     */
    public function getAccessRules()
    {
        return [
            ['json']
        ];
    }

    public function actionSearch($keyword)
    {
        return $this->contentContainer
            ? TopicPicker::searchByContainer($keyword, $this->contentContainer)
            : TopicPicker::search($keyword);
    }
}
