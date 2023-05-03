<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\admin\grid;

use Yii;
use an602\libs\ActionColumn;
use an602\modules\space\models\Space;
use an602\modules\admin\controllers\UserController;

/**
 * SpaceActionColumn
 *
 * @author Luke
 */
class SpaceActionColumn extends ActionColumn
{

    /**
     * @inheritdoc
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        $actions = [];
        $actions[Yii::t('base', 'Edit')] = ['open', 'section' => 'edit'];
        $actions[] = '---';
        $actions[Yii::t('AdminModule.space', 'Manage members')] = ['open', 'section' => 'members'];
        $actions[Yii::t('AdminModule.space', 'Change owner')] = ['open', 'section' => 'owner'];
        $actions[Yii::t('AdminModule.space', 'Manage modules')] = ['open', 'section' => 'modules'];
        $actions[Yii::t('base', 'Delete')] = ['open', 'section' => 'delete'];
        $actions[] = '---';
        $actions[Yii::t('AdminModule.space', 'Open space')] = ['open'];
        $this->actions = $actions;

        return parent::renderDataCellContent($model, $key, $index);
    }

}
