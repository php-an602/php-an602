<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2018 H u m H u b GmbH & Co. KG, PHP-AN602, The 86it Developers Network, and Yii
 * @license https://www.metamz.network/licences
 *
 */

namespace an602\modules\ui\filter\widgets;

use Yii;

class RadioFilterInput extends CheckboxFilterInput
{
    const STYLE_CHECKBOX = 'checkbox';
    const STYLE_RADIO = 'radio';
    const STYLE_CUSTOM = 'custom';

    /**
     * @var string data-action-click handler of the input event
     */
    public $clickAction = 'toggleFilter';

    /**
     * @inheritdoc
     */
    public $type = 'radio';

    public $force = false;

    public $style;

    /**
     * @var string radio group
     */
    public $radioGroup;

    public function init()
    {
        parent::init();

        if(!$this->style) {
            $this->style = ($this->force) ? static::STYLE_RADIO : static::STYLE_CHECKBOX;
        }

        if($this->style === static::STYLE_RADIO) {
            $this->iconActive = 'fa-dot-circle-o';
            $this->iconInActive = 'fa-circle-o';
        }
    }

    /**
     * @inheritdoc
     */
    protected function initFromRequest()
    {
        $filter = Yii::$app->request->get($this->radioGroup);
        if ($filter !== null) {
            $this->checked = ($filter === $this->id);
        }
    }

    /**
     * @inheritdoc
     */
    public function prepareOptions()
    {
        parent::prepareOptions();
        $this->options['data-action-click'] = $this->clickAction;
        $this->options['data-radio-group'] = $this->radioGroup;
        $this->options['data-filter-value'] = $this->value;

        if($this->force) {
            $this->options['data-radio-force'] = 1;
        }
    }

}
