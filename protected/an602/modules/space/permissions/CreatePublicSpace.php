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
 * CreatePublicSpace Permission
 */
class CreatePublicSpace extends BasePermission
{

    /**
     * @inheritdoc
     */
    protected $id = 'create_public_space';

    /**
     * @inheritdoc
     */
    protected $title = 'Create Public Spaces';

    /**
     * @inheritdoc
     */
    protected $description = 'Can create Spaces visible to all members.';

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
        
        $this->title = Yii::t('SpaceModule.permissions', 'Create Public Spaces');
        $this->description = Yii::t('SpaceModule.permissions', 'Can create Spaces visible to all members.');
    }

}
