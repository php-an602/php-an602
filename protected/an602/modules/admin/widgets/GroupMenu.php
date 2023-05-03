<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\admin\widgets;

use an602\modules\ui\menu\MenuLink;
use an602\modules\ui\menu\widgets\SubTabMenu;
use Yii;
use yii\helpers\Url;

/**
 * Group Administration Menu
 */
class GroupMenu extends SubTabMenu
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->addEntry(new MenuLink([
            'label' => Yii::t('AdminModule.user', 'Overview'),
            'url' => ['/admin/group/index'],
            'sortOrder' => 100,
            'isActive' => MenuLink::isActiveState('admin', 'group', 'index'),
        ]));
        parent::init();
    }

}
