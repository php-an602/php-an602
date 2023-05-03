<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2016 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\content\widgets;

use an602\modules\content\models\forms\AdminDeleteContentForm;

/**
 * Admin Delete Modal for Wall Entries
 *
 * This widget will be shown when admin deletes someone's content
 *
 */
class AdminDeleteModal extends \yii\base\Widget
{
    /**
     * @var AdminDeleteContentForm
     */
    public $model = null;

    /**
     * Executes the widget.
     */
    public function run()
    {
        return $this->render('adminDeleteModal', [
            'model' => $this->model,
        ]);
    }
}
