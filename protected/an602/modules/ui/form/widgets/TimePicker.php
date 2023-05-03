<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\ui\form\widgets;

use Yii;

/**
 * TimePicker form field widget
 *
 * @inheritdoc
 * @package an602\modules\ui\form\widgets
 */
class TimePicker extends \kartik\time\TimePicker
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if (!isset($this->pluginOptions['showMeridian'])) {
            $this->pluginOptions['showMeridian'] = Yii::$app->formatter->isShowMeridiem();
        }

        if (!isset($this->pluginOptions['defaultTime'])) {
            $this->pluginOptions['defaultTime'] = ($this->pluginOptions['showMeridian']) ? '10:00 AM' : '10:00';
        }
    }
}
