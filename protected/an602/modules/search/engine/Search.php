<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2015 H u m H u b GmbH & Co. KG, PHP-AN602, The 86it Developers Network, and Yii
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\search\engine;

use an602\modules\content\models\Content;
use an602\modules\content\models\ContentTag;
use an602\modules\content\components\ContentActiveRecord;
use an602\modules\content\components\ContentContainerActiveRecord;
use an602\modules\user\models\User;
use an602\modules\search\events\SearchAttributesEvent;
use an602\modules\search\interfaces\Searchable;
use an602\modules\search\models\forms\SearchForm;
use an602\modules\space\models\Space;
use yii\base\Component;

/**
 * Description of HSearchComponent
 *
 * @since 0.12
 * @author luke
 */
abstract class Search extends Component
{

    const EVENT_SEARCH_ATTRIBUTES = 'search_attributes';
    const EVENT_ON_REBUILD = 'onRebuild';
    const DOCUMENT_TYPE_USER = 'user';
    const DOCUMENT_TYPE_SPACE = 'space';
    const DOCUMENT_TYPE_CONTENT = 'content';
    const DOCUMENT_TYPE_OTHER = 'other';
    const DOCUMENT_VISIBILITY_PUBLIC = 'public';
    const DOCUMENT_VISIBILITY_PRIVATE = 'private';

    /**
     * @var int the minimum length of a search token
     */
    public $minQueryTokenLength = 2;

    /**
     * Retrieves results from search
     *
     * Available options:
     *      page
     *      pageSize
     *
     *      sortField           Mixed String/Array
     *      model               Mixed String/Array
     *      type                Mixed String/Array
     *      checkPermissions    boolean (TRUE/false)
     *      limitSpaces         Array (Limit Content to given Spaces(
     *      filters             Array (Additional filter Field=>Value)
     *
     * @param type $query
     * @param array $options
     * @return SearchResultSet
     */
    abstract public function find($query, Array $options);

    /**
     * Stores an object in search index.
     *
     * @param Searchable $object
     */
    abstract public function add(Searchable $object);

    /**
     * Updates an object in search index.
     *
     * @param Searchable $object
     */
    abstract public function update(Searchable $object);

    /**
     * Deletes an object from search.
     *
     * @param Searchable $object
     */
    abstract public function delete(Searchable $object);

    /**
     * Deletes all objects from search index.
     */
    abstract public function flush();

    /**
     * Rebuilds search index
     */
    public function rebuild()
    {
        $this->flush();
        $this->trigger(self::EVENT_ON_REBUILD);
        $this->optimize();
    }

    /**
     * Optimizes the search index.
     * Default implementation does nothing, may be overidden by child classes.
     */
    public function optimize()
    {
        
    }

    protected function getMetaInfoArray(Searchable $obj)
    {
        $meta = [];
        $meta['type'] = $this->getDocumentType($obj);
        $meta['pk'] = $obj->getPrimaryKey();
        $meta['model'] = $obj->className();

        if ($obj instanceof ContentContainerActiveRecord) {
            $meta['containerModel'] = $obj->className();
            $meta['containerPk'] = $obj->id;
        }

        // Add content related meta data
        if ($meta['type'] == self::DOCUMENT_TYPE_CONTENT) {
            if ($obj->content->container !== null) {
                $meta['containerModel'] = $obj->content->container->className();
                $meta['containerPk'] = $obj->content->container->id;
            }
            if ($obj->content->visibility == Content::VISIBILITY_PUBLIC) {
                $meta['visibility'] = self::DOCUMENT_VISIBILITY_PUBLIC;
            } else {
                $meta['visibility'] = self::DOCUMENT_VISIBILITY_PRIVATE;
            }

            $meta['contentTags'] = implode(', ', array_map(function(ContentTag $tag) {
                return $tag->name;
            }, $obj->content->tags));

        } elseif ($meta['type'] == self::DOCUMENT_TYPE_SPACE && $obj->visibility == Space::VISIBILITY_NONE) {
            $meta['visibility'] = self::DOCUMENT_VISIBILITY_PRIVATE;
        } else {
            $meta['visibility'] = self::DOCUMENT_VISIBILITY_PUBLIC;
        }

        return $meta;
    }

    protected function getDocumentType(Searchable $obj)
    {
        if ($obj instanceof Space) {
            return self::DOCUMENT_TYPE_SPACE;
        } elseif ($obj instanceof User) {
            return self::DOCUMENT_TYPE_USER;
        } elseif ($obj instanceof ContentActiveRecord) {
            return self::DOCUMENT_TYPE_CONTENT;
        } else {
            return self::DOCUMENT_TYPE_OTHER;
        }
    }

    protected function setDefaultFindOptions($options)
    {
        if (empty($options['page'])) {
            $options['page'] = 1;
        }

        if (empty($options['pageSize'])) {
            $options['pageSize'] = (new SearchForm())->pageSize;
        }

        if (!isset($options['checkPermissions'])) {
            $options['checkPermissions'] = true;
        }

        if (!isset($options['limitSpaces'])) {
            $options['limitSpaces'] = [];
        }

        return $options;
    }

    /**
     * Returns additional search attributes for the given object.
     * This contains a list of comments, files and other content addons. 
     * 
     * @param Searchable $object
     * @return array the additional search attributes
     */
    protected function getAdditionalAttributes(Searchable $object)
    {
        $additionalAttributes = [];
        $this->trigger(self::EVENT_SEARCH_ATTRIBUTES, new SearchAttributesEvent($additionalAttributes, $object));

        return $additionalAttributes;
    }

}
