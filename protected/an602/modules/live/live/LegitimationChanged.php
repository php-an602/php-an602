<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\live\live;

use an602\modules\live\components\LiveEvent;
use an602\modules\content\models\Content;

/**
 * Live event for push driver when contentContainerId legitimation was changed
 *
 * @since 1.3
 */
class LegitimationChanged extends LiveEvent
{

    /**
     * @var array the legitimation array
     */
    public $legitimation;

    /**
     * @var int the user id
     */
    public $userId;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        
        $this->visibility = Content::VISIBILITY_OWNER;
    }

}
