<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2016 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\content\widgets;

/**
 * Delete Link for Wall Entries
 *
 * This widget will attached to the WallEntryControlsWidget and displays
 * the "Delete" Link to the Content Objects.
 *
 * @package an602.modules_core.wall.widgets
 * @since 0.5
 */
class DeleteLink extends \yii\base\Widget
{

    /**
     * @var \an602\modules\content\components\ContentActiveRecord
     */
    public $content = null;

    /**
     * Executes the widget.
     */
    public function run()
    {
        if ($this->content->content->canEdit()) {

            $isAdmin = $this->content->content->created_by !== \Yii::$app->user->id;

            return $this->render('deleteLink', [
                'model' => $this->content->content->object_model,
                'id' => $this->content->content->object_id,
                'isAdmin' => $isAdmin
            ]);
        }

        return '';
    }
}
