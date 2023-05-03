<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\modules\ui\filter\widgets;

use an602\components\Widget;
use an602\libs\Sort;

/**
 * Renders a single stream filter panel which is part of a [[StreamFilterNavigation]].
 *
 * @since 1.3
 * @see FilterNavigation
 */
class FilterPanel extends Widget
{
    /**
     * @var array stream filter block definitions
     */
    public $blocks = [];

    public $view = 'filterPanel';

    public $span = 3;

    /**
     * @inheritdoc
     */
    public function run()
    {

        if(empty($this->blocks)) {
            return '';
        }

        return $this->render($this->view, ['blocks' => Sort::sort($this->blocks), 'span' => $this->span]);
    }
}
