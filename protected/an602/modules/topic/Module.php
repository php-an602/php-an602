<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
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
