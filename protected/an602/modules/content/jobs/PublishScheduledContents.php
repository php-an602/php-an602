<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2023 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\content\jobs;

use DateTime;
use DateTimeZone;
use an602\modules\content\models\Content;
use an602\modules\queue\ActiveJob;

class PublishScheduledContents extends ActiveJob
{

    /**
     * @inheritdoc
     */
    public function run()
    {
        $now = new DateTime('now', new DateTimeZone('UTC'));

        /* @var Content[] $contents*/
        $contents = Content::find()
            ->where(['state' => Content::STATE_SCHEDULED])
            ->andWhere(['<=', 'scheduled_at', $now->format('Y-m-d H:i:s')])
            ->all();

        foreach ($contents as $content) {
            $content->setState(Content::STATE_PUBLISHED);
            $content->save();
        }
    }

}
