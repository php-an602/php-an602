<?php

namespace an602\modules\user\widgets;

use an602\modules\user\models\User;

class UserWall extends \yii\base\Widget
{

    /**
     * @var User $user
     */
    public $user;

    public function run()
    {
        return $this->render('userWall', ['user' => $this->user]);
    }

}
