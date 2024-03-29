<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2015 H u m H u b GmbH & Co. KG, PHP-AN602, The 86it Developers Network, and Yii
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\installer\forms;

use Yii;

/**
 * Security Settings Form
 *
 * @since 0.5
 */
class SecurityForm extends \yii\base\Model
{

    /**
     * @var boolean allow guest acccess
     */
    public $allowGuestAccess;

    /**
     * @var boolean need approval
     */
    public $internalRequireApprovalAfterRegistration;

    /**
     * @var boolean allow anonymous registration
     */
    public $internalAllowAnonymousRegistration;

    /**
     * @var boolean allow invite from external users by email
     */
    public $canInviteExternalUsersByEmail;

    /**
     * @var boolean allow invite from external users by link
     */
    public $canInviteExternalUsersByLink;

    /**
     * @var boolean enable friendship system
     */
    public $enableFriendshipModule;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['allowGuestAccess', 'internalRequireApprovalAfterRegistration', 'internalAllowAnonymousRegistration', 'enableFriendshipModule'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'allowGuestAccess' => Yii::t('InstallerModule.base', 'Allow access for non-registered users to public content (guest access)'),
            'internalRequireApprovalAfterRegistration' => Yii::t('InstallerModule.base', 'Newly registered users have to be activated by an admin first'),
            'internalAllowAnonymousRegistration' => Yii::t('InstallerModule.base', 'External users can register (show registration form on login)'),
            'canInviteExternalUsersByEmail' => Yii::t('InstallerModule.base', 'Registered members can invite new users via email'),
            'canInviteExternalUsersByLink' => Yii::t('InstallerModule.base', 'Registered members can invite new users via link'),
            'enableFriendshipModule' => Yii::t('InstallerModule.base', 'Allow friendships between members'),
        ];
    }

}
