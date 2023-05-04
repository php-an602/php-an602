<?php
/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2018 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
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
