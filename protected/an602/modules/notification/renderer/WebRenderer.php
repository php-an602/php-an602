<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\notification\renderer;

/**
 * The WebTargetRenderer is used to render Notifications for the WebTarget.
 * 
 * @see \an602\modules\notification\targets\WebTarget
 * @author buddha
 */
class WebRenderer extends \an602\components\rendering\DefaultViewPathRenderer
{

    /**
     * @inheritdoc
     */
    public $defaultView = '@notification/views/default.php';

    /**
     * @inheritdoc
     */
    public $defaultViewPath = '@notification/views';

}
