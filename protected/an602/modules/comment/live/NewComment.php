<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\comment\live;

use an602\modules\live\components\LiveEvent;

/**
 * Live event for new comments
 *
 * @since 1.2
 */
class NewComment extends LiveEvent
{

    /**
     * @var int the id of the new comment
     */
    public $commentId;

    /**
     * @var int the id of the content
     */
    public $contentId;

}
