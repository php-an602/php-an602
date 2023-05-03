<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\space\permissions;

use an602\libs\BasePermission;
use Yii;

/**
 * CreatePrivateSpace Permission
 */
class CreatePrivateSpace extends BasePermission
{

    /**
     * @inheritdoc
     */
    protected $id = 'create_private_space';
    
    /**
     * @inheritdoc
     */
    protected $title = 'Create Private Spaces';

    /**
     * @inheritdoc
     */
    protected $description = 'Can create hidden (private) Spaces.';

    /**
     * @inheritdoc
     */
    protected $moduleId = 'space';

    /**
     * @inheritdoc
     */
    protected $defaultState = self::STATE_ALLOW;

    public function __construct($config = []) {
        parent::__construct($config);
        
        $this->title = Yii::t('SpaceModule.permissions', 'Create Private Spaces');
        $this->description = Yii::t('SpaceModule.permissions', 'Can create hidden (private) Spaces.');
    }    
}
