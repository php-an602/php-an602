<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\content\widgets;

use yii\helpers\Url;
use an602\modules\content\permissions\CreatePublicContent;

/**
 * Visibility link for Wall Entries can be used to switch form public to private and vice versa.
 *
 * @package an602.modules_core.wall.widgets
 * @since 1.2
 */
class VisibilityLink extends \yii\base\Widget
{

    /**
     * @var \an602\modules\content\components\ContentActiveRecord
     */
    public $contentRecord;

    /**
     * @inheritdoc
     */
    public function run()
    {
        $content = $this->contentRecord->content;
        $contentContainer = $content->container;
        
        // If content is global
        if ($contentContainer === null) {
            return;
        }

        // Prevent Change to "Public" in private spaces
        if(!$content->canEdit() || (!$content->visibility && !$contentContainer->visibility)) {
            return;
        } elseif($content->isPrivate() && !$contentContainer->permissionManager->can(new CreatePublicContent())) {
            return;
        }
        
        return $this->render('visibilityLink', [ 
                'content' => $content,
                'toggleLink' => Url::to(['/content/content/toggle-visibility', 'id' => $content->id])
        ]);
    }
}
