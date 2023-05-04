<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2019 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
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
