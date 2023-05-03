<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\modules\ui\filter\widgets;

class CheckboxListFilterInput extends CheckboxFilterInput
{
    /**
     * @inheritdoc
     */
    public $view = 'checkboxInput';

    /**
     * @inheritdoc
     */
    public $type = 'checkbox';

    /**
     * @var string data-action-click handler of the input event
     */
    public $clickAction = 'toggleFilter';

    /**
     * @inheritdoc
     */
    public $multiple = true;

    /**
     * @inheritdoc
     */
    public function prepareOptions()
    {
        parent::prepareOptions();
        $this->options['data-action-click'] = $this->clickAction;
        $this->options['data-filter-value'] = $this->value;
    }

}
