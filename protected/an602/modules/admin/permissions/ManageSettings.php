<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\admin\permissions;

use an602\modules\admin\components\BaseAdminPermission;

/**
 * ManageSettings Permission allows access to settings section within the admin area.
 *
 * @since 1.2
 */
class ManageSettings extends BaseAdminPermission
{
    /**
     * @inheritdoc
     */
    protected $id = 'admin_manage_settings';

    public function __construct($config = [])
    {
        parent::__construct($config);

        $this->title = \Yii::t('AdminModule.permissions', 'Manage Settings');
        $this->description = \Yii::t('AdminModule.permissions', 'Can manage general settings.');
    }

}
