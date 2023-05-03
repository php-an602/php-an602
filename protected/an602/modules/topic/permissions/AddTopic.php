<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 *
 */

namespace an602\modules\topic\permissions;


use an602\libs\BasePermission;
use an602\modules\space\models\Space;
use an602\modules\user\models\User;
use Yii;

class AddTopic extends BasePermission
{
    /**
     * @inheritdoc
     */
    public $moduleId = 'topic';

    /**
     * @inheritdoc
     */
    protected $defaultAllowedGroups = [
        Space::USERGROUP_OWNER,
        Space::USERGROUP_ADMIN,
        Space::USERGROUP_MODERATOR,
        User::USERGROUP_SELF
    ];

    /**
     * @inheritdoc
     */
    protected $fixedGroups = [
        Space::USERGROUP_GUEST,
        Space::USERGROUP_USER,
        User::USERGROUP_SELF,
        User::USERGROUP_FRIEND,
        User::USERGROUP_USER,
        User::USERGROUP_GUEST
    ];

    /**
     * @inheritdoc
     */
    public function getTitle()
    {
        return Yii::t('TopicModule.meeting', 'Add Topics');
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return Yii::t('TopicModule.permissions', 'Can add new topics');
    }
}