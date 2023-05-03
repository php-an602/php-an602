<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\content\widgets;

use an602\modules\content\components\ContentActiveRecord;
use yii\base\Widget;
use yii\helpers\Url;

/**
 * Lock/Unlock comments link for Wall Entries.
 *
 * @package an602.modules_core.wall.widgets
 * @since 1.10
 */
class LockCommentsLink extends Widget
{

    /**
     * @var ContentActiveRecord
     */
    public $contentRecord;

    /**
     * @inheritdoc
     */
    public function run()
    {
        $content = $this->contentRecord->content;

        if (!$content->canLockComments()) {
            return '';
        }

        return $this->render('lockCommentsLink', [
            'content' => $content,
            'lockCommentsLink' => Url::to(['/content/content/lock-comments', 'id' => $content->id]),
            'unlockCommentsLink' => Url::to(['/content/content/unlock-comments', 'id' => $content->id]),
        ]);
    }
}
