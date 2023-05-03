<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\ui\form\widgets;

use an602\libs\Html;
use an602\modules\ui\form\assets\CodeMirrorAssetBundle;

/**
 * Textarea form field with highlight code by CodeMirror.
 *
 * @package an602\widgets
 * @since 1.9
 */
class CodeMirrorInputWidget extends JsInputWidget
{
    /**
     * @var int defines the HTML rows attribute of the textarea
     */
    public $rows = 15;

    /**
     * @var string Style class of the textarea
     */
    public $inputClass = 'form-control';

    /**
     * @var string Mode of highlighting the textarea by CodeMirror
     */
    public $mode = 'text/html';

    /**
     * @var bool
     */
    public $spellcheck = true;

    public function run()
    {
        CodeMirrorAssetBundle::register($this->view);

        if ($this->form != null) {
            $textArea = $this->form->field($this->model, $this->attribute)->textarea($this->getOptions());
        } elseif ($this->hasModel()) {
            $textArea = Html::activeTextarea($this->model, $this->attribute, $this->getOptions());
        } else {
            $textArea = Html::textarea($this->name, $this->value, $this->getOptions());
        }

        return $textArea;
    }

    public function getAttributes()
    {
        return [
            'rows' => $this->rows,
            'class' => $this->inputClass,
            'data-codemirror' => $this->mode,
            'spellcheck' => $this->spellcheck,
        ];
    }
}
