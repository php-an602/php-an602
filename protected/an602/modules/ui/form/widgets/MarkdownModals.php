<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\modules\ui\form\widgets;

use an602\components\Widget;
use an602\widgets\LayoutAddons;

/**
 * Class MarkdownModals provides modals which are added used by the Markdown widget.
 * The widget is automatically added to the layout addons.
 *
 * @see LayoutAddons
 * @since 1.3
 */
class MarkdownModals extends Widget
{
    public function run()
    {
        return $this->render('markdownModals');
    }

}
