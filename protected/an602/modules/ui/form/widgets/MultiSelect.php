<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2018 H u m H u b GmbH & Co. KG, PHP-AN602, The 86it Developers Network, and Yii
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\ui\form\widgets;

/**
 * Multiselect
 *
 * @since 1.3
 * @author Luke
 */
class MultiSelect extends BasePicker
{

    /**
     * @inerhitdoc
     */
    public $minInput = 0;

    /**
     * Possible values
     * @var type
     */
    public $items = [];

    /**
     * @inheritdoc
     */
    protected function getItemText($item)
    {
        return array_values($item)[0];
    }

    /**
     * @inheritdoc
     */
    protected function getItemImage($item)
    {
        return null;
    }

    protected function getItemKey($item)
    {
        return key($item);
    }

    protected function getSelectedOptions()
    {
        if (empty($this->selection)) {
            $attribute = $this->attribute;
            $this->selection = ($this->model) ? $this->model->$attribute : [];
        }

        if (empty($this->selection)) {
            $this->selection = [];
        }

        $result = [];
        foreach ($this->items as $key => $value) {
            if (!$value || !$key) {
                continue;
            }

            $result[$key] = $this->buildItemOption([$key => $value], in_array($key, $this->selection));
        }
        return $result;
    }

    protected function getData()
    {
        $result = parent::getData();
        unset($result['picker-url']);
        return $result;
    }

    protected function getUrl()
    {
        return null;
    }

}
