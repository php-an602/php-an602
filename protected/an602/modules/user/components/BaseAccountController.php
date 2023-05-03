<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2016 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\components;

use Yii;
use an602\components\access\ControllerAccess;

/**
 * BaseAccountController is the base controller for user account (settings) pages
 *
 * @since 1.1
 * @author luke
 */
class BaseAccountController extends \an602\components\Controller
{

    /**
     * @inheritdoc
     */
    public $subLayout = "@an602/modules/user/views/account/_layout";

    /**
     * @inheritdoc
     */
    public function getAccessRules()
    {
        return [
            [ControllerAccess::RULE_LOGGED_IN_ONLY]
        ];
    }

    /**
     * @var \an602\modules\user\models\User the user
     */
    public $user;

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->appendPageTitle(\Yii::t('UserModule.base', 'My Account'));
        return parent::init();
    }

    /**
     * Returns the current user of this account
     *
     * @return \an602\modules\user\models\User
     */
    public function getUser()
    {
        if ($this->user === null) {
            $this->user = Yii::$app->user->getIdentity();
        }

        return $this->user;
    }

}
