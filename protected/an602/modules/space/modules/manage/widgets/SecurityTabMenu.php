<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\space\modules\manage\widgets;

use an602\modules\ui\menu\MenuLink;
use an602\modules\ui\menu\widgets\TabMenu;
use Yii;

/**
 * Space Administration Menu
 *
 * @author Luke
 */
class SecurityTabMenu extends TabMenu
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
            'label' => Yii::t('AdminModule.base', 'General'),
            'url' => $this->space->createUrl('/space/manage/security'),
            'sortOrder' => 100,
            'isActive' => MenuLink::isActiveState(null, 'security', 'index'),
        ]));

        $this->addEntry(new MenuLink([
            'label' => Yii::t('AdminModule.base', 'Permissions'),
            'url' => $this->space->createUrl('/space/manage/security/permissions'),
            'sortOrder' => 200,
            'isActive' => MenuLink::isActiveState(null, 'security', 'permissions'),
        ]));

        parent::init();
    }

}
