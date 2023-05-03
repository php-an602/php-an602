<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\space\permissions;

use an602\libs\BasePermission;
use an602\modules\space\models\Space;
use Yii;

/**
 * Invite new users to space permission
 */
class InviteUsers extends BasePermission
{

    /**
     * @inheritdoc
     */
    public $defaultAllowedGroups = [
        Space::USERGROUP_OWNER,
        Space::USERGROUP_ADMIN,
        Space::USERGROUP_MODERATOR,
        Space::USERGROUP_MEMBER,
    ];

    /**
     * @inheritdoc
     */
    protected $fixedGroups = [
        Space::USERGROUP_USER,
        Space::USERGROUP_GUEST,
    ];

    /**
     * @inheritdoc
     */
    protected $title = 'Invite users';

    /**
     * @inheritdoc
     */
    protected $description = 'Allows the user to invite new members to the space';

    /**
     * @inheritdoc
     */
    protected $moduleId = 'space';

    public function __construct($config = [])
    {
        parent::__construct($config);

        $this->title = Yii::t('SpaceModule.permissions', 'Invite users');
        $this->description = Yii::t('SpaceModule.permissions', 'Allows the user to invite new members to the space');
    }

}
