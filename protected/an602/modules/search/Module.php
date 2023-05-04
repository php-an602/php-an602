<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2015 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
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
