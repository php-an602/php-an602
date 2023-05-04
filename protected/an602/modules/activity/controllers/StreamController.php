<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2018 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
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
