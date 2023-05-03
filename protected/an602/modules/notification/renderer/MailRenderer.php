<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\notification\renderer;

/**
 * The MailTargetRenderer is used to render Notifications for the MailTarget.
 * 
 * A BaseNotification can overwrite the default view and layout by setting a specific $viewName and
 * defining the following files:
 * 
 * Overwrite default html view for this notification:
 * @module/views/notification/mail/viewname.php
 * 
 * Overwrite default mail layout for this notification:
 * @module/views/layouts/notification/mail/viewname.php
 * 
 * Overwrite default mail text layout for this notification:
 * @module/views/layouts/notification/mail/plaintext/viewname.php
 *
 * @see \an602\modules\notification\targets\MailTarget
 * @author buddha
 */
class MailRenderer extends \an602\components\rendering\MailRenderer
{

    /**
     * @inheritdoc
     */
    public $defaultView = '@notification/views/mails/default.php';

    /**
     * @inheritdoc
     */
    public $defaultViewPath = '@notification/views/mails';

    /**
     * @inheritdoc
     */
    public $defaultTextView = '@notification/views/mails/plaintext/default.php';

    /**
     * @inheritdoc
     */
    public $defaultTextViewPath = '@notification/views/mails/plaintext';

}