<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\components\behaviors;

use yii\db\ActiveRecord;
use yii\base\Behavior;

/**
 * GUID Behavior
 *
 * @author Lucas Bartholemy <lucas@bartholemy.com>
 * @package an602.behaviors
 * @since 0.5
 */
class GUID extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'setGuid',
            ActiveRecord::EVENT_BEFORE_INSERT => 'setGuid',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'setGuid',
        ];
    }

    public function setGuid($event)
    {
        if ($this->owner->isNewRecord) {
            if ($this->owner->guid == "") {
                $this->owner->guid = \an602\libs\UUID::v4();
            }
        }
    }
}
