<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\ui\menu\widgets;

/**
 * SubTabMenu
 *
 * @since 1.4
 * @package an602\modules\ui\menu\widgets
 */
abstract class SubTabMenu extends TabMenu
{
    /**
     * @var string the title of the panel
     */
    public $panelTitle;

    /**
     * @inheritdoc
     */
    public $template = '@ui/menu/widgets/views/sub-tab-menu.php';

    /**
     * @inheritdoc
     */
    public function getAttributes()
    {
        return [
            'class' => 'nav nav-tabs tab-sub-menu'
        ];
    }

}
