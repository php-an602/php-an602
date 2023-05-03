<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2016 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\stream\actions;

use an602\modules\content\components\ContentContainerActiveRecord;
use an602\modules\stream\models\ContentContainerStreamQuery;
use yii\base\InvalidConfigException;

/**
 * ContentContainerStream is used to stream contentcontainers (space or users) content.
 *
 * Used to stream contents of a specific a content container.
 *
 * @since 0.11
 * @author luke
 */
class ContentContainerStream extends Stream
{
    /**
     * @inheritdoc
     */
    public $streamQueryClass = ContentContainerStreamQuery::class;

    /**
     * @var ContentContainerActiveRecord
     */
    public $contentContainer;

    /**
     * @inheritdoc
     * @throws InvalidConfigException
     */
    protected function initQuery($options = [])
    {
        $options['container'] = $this->contentContainer;

        return parent::initQuery($options);
    }
}
