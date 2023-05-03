<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

/**
 * Created by PhpStorm.
 * User: buddha
 * Date: 13.06.2017
 * Time: 22:32
 */

namespace an602\widgets;


use an602\components\Widget;
use an602\libs\Html;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * Helper class for creating buttons.
 *
 * `Button::primary()->`
 *
 * @package an602\widgets
 */
class ModalButton extends Button
{
    /**
     * @param $url
     * @return $this
     */
    public function load($url)
    {
        return $this->action('ui.modal.load', $url)->loader(false);
    }

    public function post($url)
    {
        return $this->action('ui.modal.post', $url)->loader(false);
    }

    public function show($target)
    {
        return $this->action('ui.modal.show', null, $target);
    }

    /**
     * @param null $url
     * @param null $text
     * @return Button
     */
    public static function submitModal($url = null, $text = null)
    {
        if(!$text) {
            $text = Yii::t('base', 'Save');
        }

        return static::save($text)->submit()->action('ui.modal.submit', $url);
    }

    /**
     * @param null $text
     * @return $this
     */
    public static function cancel($text = null)
    {
        if(!$text) {
            $text = Yii::t('base', 'Cancel');
        }

        return static::defaultType($text)->close()->loader(false);
    }

    /**
     * @return $this
     */
    public function close()
    {
        return $this->options(['data-modal-close' => '']);
    }
}