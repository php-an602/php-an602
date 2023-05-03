<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\content\widgets;

use Yii;
use an602\modules\content\components\ContentContainerController;

/**
 * PinLink for Wall Entries
 *
 * This widget will attached to the WallEntryControlsWidget and displays
 * the "Pin or Unpin" Link to the Content Objects.
 *
 * @since 0.5
 */
class ArchiveLink extends \yii\base\Widget
{

    /**
     * @var \an602\modules\content\components\ContentActiveRecord
     */
    public $content;

    /**
     * Executes the widget.
     */
    public function run()
    {
        if (!$this->content->content->canArchive()) {
            return '';
        }

        return $this->render('archiveLink', [
                    'object' => $this->content,
                    'id' => $this->content->content->id,
        ]);
    }

}

?>
