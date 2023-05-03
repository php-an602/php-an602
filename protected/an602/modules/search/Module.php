<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\search;

class Module extends \an602\components\Module
{

    public $controllerNamespace = 'an602\modules\search\controllers';

    /**
     * @var int $mentioningSearchBoxResultLimit Maximum results in mentioning users/spaces box
     */
    public $mentioningSearchBoxResultLimit = 6;

}
