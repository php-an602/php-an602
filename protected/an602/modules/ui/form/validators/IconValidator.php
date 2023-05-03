<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\modules\ui\form\validators;

use an602\modules\ui\form\widgets\IconPicker;
use an602\modules\ui\icon\widgets\Icon;
use Yii;
use yii\validators\Validator;


/**
 * IconValidator validates input from the IconPicker
 *
 * @since 1.3
 * @see IconPicker
 */
class IconValidator extends Validator
{

    /**
     * @param \yii\base\Model $model
     * @param string $attribute
     */
    public function validateAttribute($model, $attribute)
    {
        $iconPicker = new IconPicker(['model' => $model, 'attribute' => $attribute]);

        if (!in_array($model->$attribute, Icon::$names)) {
            $this->addError($model, $attribute, Yii::t('UiModule.form', 'Invalid icon.'));
        }
    }

}
