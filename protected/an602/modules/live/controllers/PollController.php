<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 H u m H u b GmbH & Co. KG, PHP-AN602, The 86it Developers Network, and Yii
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\live\controllers;

use Yii;
use yii\db\Expression;
use yii\base\Exception;
use an602\modules\content\models\Content;
use an602\components\Controller;
use an602\modules\live\models\Live;
use an602\modules\live\components\LiveEvent;

/**
 * PollController is used by the live database driver to deliever events
 *
 * @see \an602\modules\live\driver\Database
 * @since 1.2
 * @author Luke
 */
class PollController extends Controller
{
    /**
     * @inheritdoc
     */
    protected $doNotInterceptActionIds = ['*'];

    /**
     * @var int maximum events by query
     */
    public $maxEventsByQuery = 500;

    /**
     * @var int maximum decay for last query time
     */
    public $maxTimeDecay = 500;

    /**
     * An array of legitimate content container ids
     *
     * @see \an602\modules\live\Module::getLegitimateContentContainerIds()
     * @var array
     */
    protected $containerIds = [];

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            return false;
        }

        if (Yii::$app->user->mustChangePassword()) {
            return false;
        }

        if (parent::beforeAction($action)) {
            if (!Yii::$app->live->driver instanceof \an602\modules\live\driver\Poll) {
                throw new Exception('Polling is only available when using the live database driver!');
            }

            $this->containerIds = $this->module->getLegitimateContentContainerIds(Yii::$app->user->getIdentity());
            return true;
        }

        return false;
    }

    /**
     * Returns a list of new live events for the current user
     * The GET parameter is a unix timestamp of the last update.
     *
     * @return string the json response
     */
    public function actionIndex()
    {
        $lastSessionTime = Yii::$app->session->get('live.poll.lastQueryTime');
        $lastQueryTime = $this->getLastQueryTime();

        $results = [];
        $results['queryTime'] = time();
        $results['lastQueryTime'] = $lastQueryTime;
        $results['lastSessionTime'] = $lastSessionTime;
        $results['events'] = [];

        foreach ($this->buildLookupQuery($lastQueryTime)->all() as $live) {
            $liveEvent = $this->unserializeEvent($live->serialized_data);
            if ($liveEvent !== null && $this->checkVisibility($liveEvent)) {
                $results['events'][$live->id] = $liveEvent->getData();
            }
        }

        Yii::$app->session->set('live.poll.lastQueryTime', $results['queryTime']);
        
        Yii::$app->response->format = 'json';
        return $results;
    }

    /**
     * Unserializes an event from database
     *
     * @param string serialized event
     * @return LiveEvent the live event
     */
    protected function unserializeEvent($serializedEvent)
    {
        try {
            /* @var $liveEvent LiveEvent */
            $liveEvent = unserialize($serializedEvent);

            if (!$liveEvent instanceof LiveEvent) {
                throw new Exception('Invalid live event class after unserialize!');
            }
        } catch (\Exception $ex) {
            Yii::error('Could not unserialize live event! ' . $ex->getMessage(), 'live');
            return null;
        }

        return $liveEvent;
    }

    /**
     * Checks if the live event is visible for the current user.
     *
     * @param LiveEvent $liveEvent
     * @return boolean is visible
     */
    protected function checkVisibility(LiveEvent $liveEvent)
    {
        return true;
    }

    /**
     * Creates a query to lookup live events.
     *
     * @param int $lastQueryTime the last lookup
     * @return \yii\db\ActiveQuery the query
     */
    protected function buildLookupQuery($lastQueryTime)
    {
        $query = Live::find();

        // Public content e.g. following
        $query->andWhere([
            'and',
            ['IN', 'contentcontainer_id', $this->containerIds[Content::VISIBILITY_PUBLIC]],
            ['visibility' => Content::VISIBILITY_PUBLIC],
        ]);

        // Private content e.g. space membership, friends
        $query->orWhere([
            'and',
            ['IN', 'contentcontainer_id', $this->containerIds[Content::VISIBILITY_PRIVATE]],
            ['IN', 'visibility', [Content::VISIBILITY_PRIVATE, Content::VISIBILITY_PUBLIC]],
        ]);

        // Own content e.g. direct chat message, own profile
        $query->orWhere([
            'and',
            ['IN', 'contentcontainer_id', $this->containerIds[Content::VISIBILITY_OWNER]],
            ['IN', 'visibility', [Content::VISIBILITY_PRIVATE, Content::VISIBILITY_PUBLIC, Content::VISIBILITY_OWNER]],
        ]);

        // Global messages
        $query->orWhere(['IS', 'contentcontainer_id', new Expression('NULL')]);

        $query->andWhere(['>=', 'created_at', $lastQueryTime]);
        $query->limit($this->maxEventsByQuery);
        return $query;
    }

    /**
     * Returns the last query timestamp by the last GET parameter
     * The parameter is validated, if invalid or empty the current time
     * will be returned.
     *
     * @return int the validated last query time
     */
    protected function getLastQueryTime()
    {
        $currentTime = time();

        $last = (int) Yii::$app->request->get('last', $currentTime);
        if (empty($last)) {
            $last = time();
        }
        
        if ($last + $this->maxTimeDecay < $currentTime) {
            Yii::info('User requested too old live data! Requested: ' . $last . ' Now: ' . $currentTime, 'live');
            $last = $currentTime;
        }

        return $last;
    }

}
