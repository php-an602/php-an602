<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\ui\menu;

use an602\modules\ui\menu\widgets\Menu;
use yii\bootstrap\Html;

/**
 * Class DropdownDivider
 *
 * Used for rendering divider within a DropdownMenu.
 *
 * Usage:
 *
 * ```php
 * $dropdown->addEntry(new DropdownDivider(['sortOrder' => 100]);
 * ```
 *
 * @since 1.4
 * @see Menu
 */
class DropdownDivider extends MenuEntry
{
    /**
     * @inheritdoc
     */
    public function renderEntry($extraHtmlOptions = [])
    {
        Html::addCssClass($extraHtmlOptions, 'divider');
        return Html::tag('li', '', $this->getHtmlOptions($extraHtmlOptions));
    }
}
