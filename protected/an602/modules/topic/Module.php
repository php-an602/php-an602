<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\modules\topic;

use an602\modules\topic\permissions\ManageTopics;
use Yii;
use an602\modules\topic\permissions\AddTopic;
use an602\modules\space\models\Space;

/**
 * Admin Module
 */
class Module extends \an602\components\Module
{

    /**
     * @var string defines the icon for topics used in badges etc.
     */
    public $icon = 'fa-star';

    /**
     * @inheritdoc
     */
    public function getPermissions($contentContainer = null)
    {
        if ($contentContainer instanceof Space) {
            return [
                new AddTopic(),
                new ManageTopics(),
            ];
        }

        return [];
    }
}
