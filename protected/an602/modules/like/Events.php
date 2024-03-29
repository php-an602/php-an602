<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2015 H u m H u b GmbH & Co. KG, PHP-AN602, The 86it Developers Network, and Yii
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\like;

use an602\components\ActiveRecord;
use an602\components\Event;
use an602\modules\like\models\Like;
use Yii;

/**
 * Events provides callbacks to handle events.
 *
 * @author luke
 */
class Events extends \yii\base\BaseObject
{

    /**
     * On User delete, also delete all comments
     *
     * @param Event $event
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public static function onUserDelete($event)
    {
        foreach (Like::findAll(['created_by' => $event->sender->id]) as $like) {
            /** @var Like $like */
            $like->delete();
        }

        return true;
    }

    /**
     * On any ActiveRecord deletion check for assigned likes
     *
     * @param $event
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public static function onActiveRecordDelete($event)
    {
        /** @var ActiveRecord $record */
        $record = $event->sender;
        if ($record->hasAttribute('id')) {
            foreach (Like::findAll(['object_id' => $record->id, 'object_model' => $record->className()]) as $like) {
                $like->delete();
            }
        }

        return true;
    }

    /**
     * Callback to validate module database records.
     *
     * @param Event $event
     */
    public static function onIntegrityCheck($event)
    {
        $integrityController = $event->sender;
        $integrityController->showTestHeadline("Like (" . Like::find()->count() . " entries)");

        foreach (Like::find()->each() as $like) {
            if ($like->source === null) {
                if ($integrityController->showFix("Deleting like id " . $like->id . " without existing target!")) {
                    $like->delete();
                }
            }
            // User exists
            if ($like->user === null) {
                if ($integrityController->showFix("Deleting like id " . $like->id . " without existing user!")) {
                    $like->delete();
                }
            }
        }
    }

    /**
     * On initalizing the wall entry controls also add the like link widget
     *
     * @param Event $event
     */
    public static function onWallEntryLinksInit($event)
    {
        $event->sender->addWidget(widgets\LikeLink::class, ['object' => $event->sender->object], ['sortOrder' => 20]);
    }


    /**
     * @return Module the like module
     */
    private static function getModule()
    {
        return Yii::$app->getModule('like');
    }

}
