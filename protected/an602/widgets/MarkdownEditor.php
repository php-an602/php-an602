<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2016 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\widgets;

/**
 * MarkdownEditorWidget replaces a textarea element with bootstrap-markdown editor
 *
 * @todo Allow multiple MarkdownEditorWidget instances on a page
 * @deprecated since 1.2.2 use MarkdownField instead
 * @author luke
 * @since 0.11
 */
class MarkdownEditor extends \yii\base\Widget
{

    /**
     * Html field id of textarea which should be Markdown editor
     *
     * @var string
     */
    public $fieldId = "";

    /**
     * HMarkdown parser class used for preview
     *
     * @var string
     */
    public $parserClass = "HMarkdown";

    /**
     * Stylesheet for Highlight.js for preview
     */
    public $highlightJsCss = "github";

    /**
     * Optional markdown preview url
     *
     * @var string
     */
    public $previewUrl = "";

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->previewUrl == "") {
            $this->previewUrl = \yii\helpers\Url::toRoute(['/markdown/preview', 'parser' => $this->parserClass]);
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        return $this->render('markdownEditor', [
                    'fieldId' => $this->fieldId,
                    'previewUrl' => $this->previewUrl
        ]);
    }

}
