<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2019 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\ldap;

/**
 * Friedship Module
 */
class Module extends \an602\components\Module
{

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'an602\modules\ldap\controllers';

    /**
     * @var int the page size for ldap query, set to 0 to disable pagination
     */
    public $pageSize = 10000;

    /**
     * @var array|null the queried LDAP attributes, leave empty to retrieve all
     */
    public $queriedAttributes = [];
}
