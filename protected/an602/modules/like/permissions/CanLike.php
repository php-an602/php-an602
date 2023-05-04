<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2020 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\like\permissions;

use an602\modules\space\models\Space;
use an602\modules\user\models\User;

/**
 * CanLike Permission
 */
class CanLike extends \an602\libs\BasePermission
{

    /**
     * @inheritdoc
     */
    public $defaultAllowedGroups = [
        Space::USERGROUP_OWNER,
        Space::USERGROUP_ADMIN,
        Space::USERGROUP_MODERATOR,
        Space::USERGROUP_MEMBER,
        Space::USERGROUP_USER,
        User::USERGROUP_SELF,
        User::USERGROUP_FRIEND,
        User::USERGROUP_USER,
    ];

    /**
     * @inheritdoc
     */
    protected $fixedGroups = [
        Space::USERGROUP_GUEST,
        User::USERGROUP_GUEST,
    ];

    /**
     * @inheritdoc
     */
    protected $title;

    /**
     * @inheritdoc
     */
    protected $description;

    /**
     * @inheritdoc
     */
    protected $moduleId = 'like';

    public function __construct($config = [])
    {
        parent::__construct($config);

        $this->title = \Yii::t('LikeModule.permissions', 'Can like');
        $this->description = \Yii::t('LikeModule.permissions', 'Allows user to like content');
    }

}
