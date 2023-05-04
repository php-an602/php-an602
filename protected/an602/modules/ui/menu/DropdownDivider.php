<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2018 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
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
