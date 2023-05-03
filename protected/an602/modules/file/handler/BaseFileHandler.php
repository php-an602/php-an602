<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\file\handler;

/**
 * BaseFileHandler
 * 
 * @since 1.2
 * @author Luke
 */
abstract class BaseFileHandler extends \yii\base\Component
{

    /**
     * Output list position
     */
    const POSITION_TOP = '1';
    const POSITION_STANDARD = '5';

    /**
     * @var int the position of the file handler
     */
    public $position = self::POSITION_STANDARD;

    /**
     * @var \an602\modules\file\models\File the file
     */
    public $file;

    /**
     * The file handler link
     * 
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     * @see \an602\modules\file\widgets\FileHandlerButtonDropdown
     * @return array the HTML attributes of the button.
     */
    abstract public function getLinkAttributes();
}
