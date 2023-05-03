<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2023 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\content\jobs;

use an602\modules\content\models\Content;
use an602\modules\queue\ActiveJob;

class PurgeDeletedContents extends ActiveJob
{

    /**
     * @inheritdoc
     */
    public function run()
    {
        foreach (Content::findAll(['content.state' => Content::STATE_DELETED]) as $content) {
            $content->delete();
        }
    }

}
