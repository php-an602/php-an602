<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\ui\menu\widgets;

/**
 * Class DropdownMenu
 *
 * @since 1.4
 * @package an602\modules\ui\menu\widgets
 */
abstract class DropdownMenu extends Menu
{
    /**
     * @var string the label of the dropdown button
     */
    public $label;

    /**
     * @inheritdoc
     */
    public $template = '@ui/menu/widgets/views/dropdown-menu.php';


    /**
     * @inheritdoc
     */
    public function getAttributes()
    {
        return [
            'class' => 'btn-group dropdown-navigation'
        ];
    }

}
