<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\modules\ui\filter\models;

use yii\db\ActiveQuery;

abstract class QueryFilter extends Filter
{
    /**
     * @var ActiveQuery
     */
    public $query;
}
