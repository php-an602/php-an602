<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2023 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
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
