<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\post;

use an602\modules\post\models\Post;

/**
 * Event callbacks for the post module
 */
class Events extends \yii\base\BaseObject
{

    /**
     * Callback to validate module database records.
     *
     * @param \yii\base\Event $event
     */
    public static function onIntegrityCheck($event)
    {
        $integrityController = $event->sender;

        $integrityController->showTestHeadline("Post  Module - Posts (" . Post::find()->count() . " entries)");
        foreach (Post::find()->all() as $post) {
            /* @var Post $post */
            if (empty($post->content->id)) {
                if ($integrityController->showFix("Deleting post " . $post->id . " without existing content record!")) {
                    $post->hardDelete();
                }
            }
        }
    }

}
