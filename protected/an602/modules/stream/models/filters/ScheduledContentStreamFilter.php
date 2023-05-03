<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2023 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\stream\models\filters;

use an602\modules\activity\stream\ActivityStreamQuery;
use an602\modules\content\models\Content;
use Yii;

/**
 * @since 1.14
 */
class ScheduledContentStreamFilter extends StreamQueryFilter
{
    /**
     * @var Content[]
     */
    private array $scheduledContent = [];

    /**
     * @inheritdoc
     */
    public function apply()
    {
        if ($this->streamQuery instanceof ActivityStreamQuery && $this->streamQuery->activity) {
            return;
        }

        if ($this->streamQuery->isInitialQuery()) {
            $this->fetchScheduledContent();
        } else {
            $this->streamQuery->stateFilterCondition[] = ['content.state' => Content::STATE_SCHEDULED];
        }
    }

    /**
     * @return void
     */
    private function fetchScheduledContent(): void
    {
        $scheduledQuery = clone $this->query;
        $scheduledQuery->andWhere([
            'AND', ['content.state' => Content::STATE_SCHEDULED],
            ['content.created_by' => Yii::$app->user->id]]
        );
        $scheduledQuery->limit(100);
        $this->scheduledContent = $scheduledQuery->all();
    }

    /**
     * @inheritdoc
     */
    public function postProcessStreamResult(array &$results): void
    {
        $results = array_merge($this->scheduledContent, $results);
    }

}
