<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\modules\activity\controllers;

use an602\modules\activity\actions\ActivityStreamAction;
use an602\modules\content\components\ContentContainerController;

class StreamController extends ContentContainerController
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'stream' => [
                'class' => ActivityStreamAction::class,
                'contentContainer' => $this->contentContainer
            ],
        ];
    }

}
