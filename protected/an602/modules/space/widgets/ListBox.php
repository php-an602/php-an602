<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2016 H u m H u b GmbH & Co. KG, PHP-AN602, The 86it Developers Network, and Yii
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\space\widgets;

use yii\base\Widget;
use yii\data\Pagination;

/**
 * ListBox returns the content of the space list modal
 * 
 * Example Action:
 * 
 * ```php
 * public actionSpaceList() {
 *       $query = Space::find();
 *       $query->where(...);
 *        
 *       $title = "Some Spaces";
 *  
 *       return $this->renderAjaxContent(ListBox::widget(['query' => $query, 'title' => $title]));
 * }
 * ```
 * 
 * @since 1.1
 * @author luke
 */
class ListBox extends Widget
{

    /**
     * @var \yii\db\ActiveQuery
     */
    public $query;

    /**
     * @var string title of the box (not html encoded!)
     */
    public $title = 'Spaces';

    /**
     * @var int displayed users per page
     */
    public $pageSize = 25;

    /**
     * @inheritdoc
     */
    public function run()
    {
        $countQuery = clone $this->query;
        $pagination = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => $this->pageSize]);
        $this->query->offset($pagination->offset)->limit($pagination->limit);

        return $this->render('listBox', [
                    'title' => $this->title,
                    'spaces' => $this->query->all(),
                    'pagination' => $pagination
        ]);
    }

}
