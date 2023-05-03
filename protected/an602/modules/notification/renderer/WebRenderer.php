<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
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
