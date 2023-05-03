<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\grid;

use yii\db\ActiveRecord;
use yii\grid\DataColumn;

/**
 * BaseColumn for user grid fields
 *
 * @since 1.3
 * @author Luke
 */
abstract class BaseColumn extends DataColumn
{

    /**
     * @var string|null name of user attribute
     */
    public $userAttribute = null;

    /**
     * Returns the user record 
     * 
     * @param ActiveRecord $record
     * @return \an602\modules\user\models\User the user model
     */
    public function getUser(ActiveRecord $record)
    {
        if ($this->userAttribute === null) {
            return $record;
        }

        $attributeName = $this->userAttribute;
        return $record->$attributeName;
    }

}
