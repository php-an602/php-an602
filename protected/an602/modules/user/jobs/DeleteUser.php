<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\jobs;

use Yii;
use yii\base\InvalidArgumentException;
use an602\modules\queue\ActiveJob;
use an602\modules\queue\interfaces\ExclusiveJobInterface;
use an602\modules\user\models\User;

/**
 * Deletes a user
 *
 * @author Luke
 */
class DeleteUser extends ActiveJob implements ExclusiveJobInterface
{

    public $user_id;

    /**
     * @inhertidoc
     */
    public function getExclusiveJobId()
    {
        if (empty($this->user_id)) {
            throw new InvalidArgumentException('User id cannot be empty!');
        }

        return 'user.deleteUser.' . $this->user_id;
    }

    /**
     * @inhertidoc
     */
    public function run()
    {
        $user = User::findOne(['id' => $this->user_id]);
        if ($user === null) {
            return;
        }
        
        $user->delete();
        
    }

}
