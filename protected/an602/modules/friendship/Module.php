<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2016 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\friendship;

use Yii;

/**
 * Friedship Module
 */
class Module extends \an602\components\Module
{

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'an602\modules\friendship\controllers';

    /**
     * Returns if the friendship system is enabled
     *
     * @return boolean is enabled
     */
    public function getIsEnabled()
    {
        if (Yii::$app->getModule('friendship')->settings->get('enable')) {
            return true;
        }

        return false;
    }

    public function getName()
    {
        return Yii::t('FriendshipModule.base', 'Friendship');
    }

    /**
     * @inheritdoc
     */
    public function getNotifications()
    {
       return [
           'an602\modules\friendship\notifications\Request',
           'an602\modules\friendship\notifications\RequestApproved',
           'an602\modules\friendship\notifications\RequestDeclined'
       ];
    }
}
