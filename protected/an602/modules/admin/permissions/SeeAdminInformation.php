<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2017 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b GmbH & Co. KG
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\admin\permissions;

use an602\modules\admin\components\BaseAdminPermission;

/**
 * SeeAdminInformation Permission allows access to information section within the admin area.
 *
 * @since 1.2
 */
class SeeAdminInformation extends BaseAdminPermission
{
    /**
     * @inheritdoc
     */
    protected $id = 'admin_see_information';

    public function __construct($config = [])
    {
        parent::__construct($config);

        $this->title = \Yii::t('AdminModule.permissions', 'Access Admin Information');
        $this->description = \Yii::t('AdminModule.permissions', 'Can access the \'Administration -> Information\' section.');
    }

}
