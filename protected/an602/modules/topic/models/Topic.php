<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 H u m H u b GmbH & Co. KG, PHP-AN602, The 86it Developers Network, and Yii
 * @license https://www.metamz.network/licences
 *
 */

namespace an602\modules\topic\models;

use an602\modules\content\interfaces\ContentOwner;
use an602\modules\stream\helpers\StreamHelper;
use an602\modules\content\models\Content;
use an602\modules\topic\permissions\AddTopic;
use an602\modules\content\models\ContentTag;
use Yii;

/**
 * ContentTag type used for categorizing content.
 *
 * @since 1.3
 */
class Topic extends ContentTag
{
    /**
     * @inheritdoc
     */
    public $moduleId = 'topic';

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('TopicModule.base', 'Name'),
            'color' => Yii::t('TopicModule.base', 'Color'),
            'sort_order' => Yii::t('TopicModule.base', 'Sort order'),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function getLabel()
    {
        return Yii::t('TopicModule.base', 'Topic');
    }

    /**
     * @return string topic icon used in badges etc.
     */
    public static function getIcon()
    {
        return Yii::$app->getModule('topic')->icon;
    }

    /**
     * @return string link to topic filter stream page
     */
    public function getUrl()
    {
        return StreamHelper::createUrl($this->container, ['topicId' => $this->id]);
    }

    /**
     * Attaches the given topics to the given content instance.
     *
     * @param Content $content target content
     * @param int[]|int|Topic|Topic[] $topics either a single or array of topics or topic Ids to add.
     */
    public static function attach(ContentOwner $contentOwner, $topics)
    {
        $content = $contentOwner->getContent();

        /* @var $result static[] */
        $result = [];

        // Clear all relations and append them again
        static::deleteContentRelations($content);

        $canAdd = $content->container->can(AddTopic::class);

        if (empty($topics)) {
            return;
        }

        $topics = is_array($topics) ? $topics : [$topics];

        foreach ($topics as $topic) {
            if(is_string($topic) && strpos($topic, '_add:') === 0 && $canAdd) {
                $newTopic = new Topic([
                    'name' => substr($topic, strlen('_add:')),
                    'contentcontainer_id' => $content->contentcontainer_id
                ]);

                if ($newTopic->save()) {
                    $result[] = $newTopic;
                }

            } elseif (is_numeric($topic)) {
                $topic = Topic::findOne((int) $topic);
                if ($topic) {
                    $result[] = $topic;
                }
            } elseif ($topic instanceof Topic) {
                $result[] = $topic;
            }
        }

        $content->addTags($result);
    }
}
