<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\models;

use an602\components\ActiveRecord;

/**
 * This is the model class for table "user_http_session".
 *
 * The followings are the available columns in table 'user_http_session':
 * @property string $id
 * @property integer $expire
 * @property integer $user_id
 * @property string $data
 *
 * @package an602.modules_core.user.models
 * @since 0.5
 * @author Luke
 */
class Session extends ActiveRecord
{

    /**
     * @return string the associated database table name
     */
    public static function tableName()
    {
        return 'user_http_session';
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

}
