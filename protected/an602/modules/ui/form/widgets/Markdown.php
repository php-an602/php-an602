<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 H u m H u b GmbH & Co. KG, PHP-AN602, The 86it Developers Network, and Yii
 * @license https://www.metamz.network/licences
 *
 */


namespace an602\modules\ui\form\widgets;

use an602\libs\Html;
use an602\modules\file\widgets\UploadButton;
use an602\modules\ui\form\assets\MarkdownFieldAsset;
use yii\helpers\Url;

/**
 * Simple Markdown Editor form fields.
 *
 * @deprecated since 1.5 use `an602\modules\content\widgets\richtext\RichTextField` instead
 * @package an602\widgets
 * @since 1.2.2
 */
class Markdown extends JsInputWidget
{
    /**
     * @inheritdoc
     */
    public $jsWidget = 'ui.markdown.MarkdownField';

    /**
     * @var int defines the HTML rows attribute of the textarea
     */
    public $rows = 3;

    /**
     * @var string markdown preview url
     */
    public $previewUrl;

    /**
     * HMarkdown parser class used for preview
     *
     * @var string
     */
    public $parserClass = "HMarkdown";

    /**
     * @var bool show label
     */
    public $label = false;

    /**
     * @var string defines the name of the hidden input name for uploaded files if not set the UploadButton default is used
     * @see UploadButton
     */
    public $filesInputName;

    /**
     * Can defined in addition to $fileAttribute to change the form model of the file from $model to $fileModel.
     * Note: this is only affects the formName for the file upload.
     * @var string
     */
    public $fileModel;

    /**
     * Can be set if $model is defined, to create a loadable fileInput name which is respected in Model::load()
     * Note: this is only affects the formName for the file upload.
     * @var string
     */
    public $fileAttribute;

    /**
     * @var boolean if set to true the markdown field will be disabled
     */
    public $disabled = false;

    /**
     * @var boolean if set to true the markdown field will set to readonly
     */
    public $readonly = false;

    /**
     * @var string
     */
    public $placeholder;

    /**
     * @inheritdoc
     */
    public $fadeIn = 'fast';

    /**
     * @inheritdoc
     */
    public $init = true;

    public function init()
    {
        if (empty($this->previewUrl)) {
            $this->previewUrl = Url::toRoute(['/markdown/preview', 'parser' => $this->parserClass]);
        }
    }

    public function run()
    {
        MarkdownFieldAsset::register($this->view);

        if ($this->placeholder === null && $this->hasModel()) {
            $this->placeholder = $this->model->getAttributeLabel($this->attribute);
        }

        if ($this->form != null) {
            $textArea = $this->form->field($this->model, $this->attribute)->textarea($this->getOptions())->label($this->label);
        } elseif ($this->model != null) {
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
            'disabled' => $this->disabled,
            'readonly' => $this->readonly,
            'placeholder' => $this->placeholder,
            'class' => 'form-control'
        ];
    }

    public function getData()
    {
        if (empty($this->fileModel)) {
            $this->fileModel = $this->model;
        }

        if ($this->model && $this->fileAttribute) {
            $this->filesInputName = $this->fileModel->formName() . '[' . $this->fileAttribute . '][]';
        }

        return [
            'preview-url' => $this->previewUrl,
            'files-input-name' => !empty($this->filesInputName) ? $this->filesInputName : null
        ];
    }
}
