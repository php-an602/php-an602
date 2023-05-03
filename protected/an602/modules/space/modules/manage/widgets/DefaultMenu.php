<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\space\modules\manage\widgets;

use Yii;
use an602\modules\ui\menu\MenuLink;
use an602\modules\ui\menu\widgets\TabMenu;

/**
 * Space Administration Menu
 *
 * @author Luke
 */
class DefaultMenu extends TabMenu
{

    /**
     * @var \an602\modules\space\models\Space
     */
    public $space;

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->addEntry(new MenuLink([
            'label' => Yii::t('AdminModule.base', 'Basic'),
            'url' => $this->space->createUrl('/space/manage/default/index'),
            'sortOrder' => 100,
            'isActive' => MenuLink::isActiveState(null, 'default', 'index')
        ]));

        $this->addEntry(new MenuLink([
            'label' => Yii::t('AdminModule.base', 'Advanced'),
            'url' => $this->space->createUrl('/space/manage/default/advanced'),
            'sortOrder' => 200,
            'isActive' => MenuLink::isActiveState(null, 'default', 'advanced')
        ]));

        parent::init();
    }

}
