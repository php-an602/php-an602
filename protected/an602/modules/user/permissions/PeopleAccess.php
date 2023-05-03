<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2021 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\permissions;

use an602\libs\BasePermission;
use Yii;

class PeopleAccess extends BasePermission
{
    /**
     * @inheritdoc
     */
    protected $moduleId = 'user';

    /**
     * @inheritdoc
     */
    protected $defaultState = self::STATE_ALLOW;

    /**
     * @inheritdoc
     */
    public function getTitle()
    {
        return Yii::t('UserModule.permissions', 'Can Access \'People\'');
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return Yii::t('UserModule.permissions', 'Can access \'People\' section.');
    }
}
