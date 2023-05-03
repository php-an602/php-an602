<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2023 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\modules\content\events;

use an602\modules\content\models\Content;

class ContentStateEvent extends ContentEvent
{
    public Content $content;

    public int $newState;
    public ?int $previousState;
}
