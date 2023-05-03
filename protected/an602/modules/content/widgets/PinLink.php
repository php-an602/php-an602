<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\content\widgets;

use Yii;
use yii\helpers\Url;
use an602\modules\content\components\ContentContainerController;

/**
 * PinLinkWidget for Wall Entries shows a pin link.
 *
 * This widget will attached to the WallEntryControlsWidget and displays
 * the "Pin or Unpin" Link to the Content Objects.
 *
 * @package an602.modules_core.wall.widgets
 * @since 0.5
 */
class PinLink extends \yii\base\Widget
{

    /**
     * @var \an602\modules\content\components\ContentActiveRecord
     */
    public $content;

    /**
     * @inheritdoc
     */
    public function run()
    {

        // Show pin links only inside content container streams
        if (!$this->content->content->canPin()) {
            return;
        }

        return $this->render('pinLink', [
                    'pinUrl' => Url::to(['/content/content/pin', 'id' => $this->content->content->id]),
                    'unpinUrl' => Url::to(['/content/content/un-pin', 'id' => $this->content->content->id]),
                    'isPinned' => $this->content->content->isPinned()
        ]);
    }

}

?>
