<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 H u m H u b GmbH & Co. KG, PHP-AN602, The 86it Developers Network, and Yii
 * @license https://www.metamz.network/licences
 *
 */

/**
 * Created by PhpStorm.
 * User: buddha
 * Date: 23.07.2017
 * Time: 22:06
 */

namespace an602\modules\content\models;


use an602\components\ActiveRecord;
use yii\base\InvalidArgumentException;

/**
 * Class ContentTagRelation
 *
 * @property integer $id
 * @property integer $content_id
 * @property integer $tag_id
 *
 * @since 1.2.2
 * @author buddha
 */
class ContentTagRelation extends ActiveRecord
{
    public static function tableName()
    {
        return "content_tag_relation";
    }

    /**
     * ContentTagRelation constructor.
     * @param array $content
     * @param ContentTag|null $tag
     * @param array $config
     */
    public function __construct($content = [], $tag = null, $config = [])
    {
        if(is_array($content)) {
            parent::__construct($content);
        } elseif($content instanceof Content) {
            $this->setContent($content);

            if($tag !== null && $tag->isNewRecord) {
                throw new InvalidArgumentException('ContentTag was not saved before creating ContentTagRelation');
            }

            if($tag !== null) {
                $this->setTag($tag);
            }
            parent::__construct($config);
        } else {
            parent::__construct([]);
        }
    }

    public static function findBy($contentId, $tagId) {
        $contentId = ($contentId instanceof Content) ? $contentId->id : $contentId;
        $tagId = ($tagId instanceof ContentTag) ? $tagId->id : $tagId;

        return self::find()->where(['content_id' => $contentId])->andWhere(['tag_id' => $tagId]);
    }

    public function getTag()
    {
        return $this->hasOne(ContentTagAddition::class, ['id' => 'tag_id']);
    }

    public function getContent()
    {
        return $this->hasOne(Content::class, ['id' => 'content_id']);
    }

    public function setContent(Content $content)
    {
        $this->content_id = $content->id;
    }

    public function setTag(ContentTag $tag)
    {
        $this->tag_id = $tag->id;
    }
}
