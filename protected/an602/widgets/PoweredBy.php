<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\widgets;

use an602\components\Widget;
use an602\libs\Html;
use Yii;

/**
 * PoweredBy widget
 *
 * @since 1.3.7
 * @author Luke
 */
class PoweredBy extends Widget
{

    /**
     * @var bool return text link only
     */
    public $textOnly = false;

    /**
     * @var array link tag HTML options
     */
    public $linkOptions = [];

    /**
     * @inheritdoc
     */
    public function run()
    {

        if (static::isHidden()) {
            return '';
        }

        if ($this->textOnly) {
            return Yii::t('base', 'Powered by {name}', ['name' => 'An602 (https://an602.org)']);
        }

        if (!isset($this->linkOptions['target'])) {
            $this->linkOptions['target'] = '_blank';
        }

        return Yii::t('base', 'Powered by {name}', [
            'name' => Html::a('An602', 'https://an602.org', $this->linkOptions)
        ]);
    }

    public static function isHidden()
    {
        return isset(Yii::$app->params['hidePoweredBy']);
    }

}
