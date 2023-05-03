<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\admin\permissions;

use an602\modules\admin\components\BaseAdminPermission;

/**
 * ManageModules Permission allows access to module section within the admin area.
 *
 * @since 1.2
 */
class ManageModules extends BaseAdminPermission
{
    /**
     * @inheritdoc
     */
    protected $id = 'admin_manage_modules';

    /**
     * ManageModules constructor.
     *
     * @param array $config
     */
    public function __construct($config = [])
    {
        parent::__construct($config);

        $this->title = \Yii::t('AdminModule.permissions', 'Manage Modules');
        $this->description = \Yii::t('AdminModule.permissions', 'Can manage modules within the \'Administration ->  Modules\' section.');
    }

}
