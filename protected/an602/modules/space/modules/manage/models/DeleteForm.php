<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\space\modules\manage\models;

use an602\modules\user\components\CheckPasswordValidator;
use Yii;
use yii\base\Model;

/**
 * Form Model for Space Deletion
 *
 * @since 0.5
 */
class DeleteForm extends Model
{

    /**
     * @var string the space name to check
     */
    public $spaceName;


    /**
     * @var string the space name given by the user
     */
    public $confirmSpaceName;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['confirmSpaceName', 'required'],
            ['confirmSpaceName', 'compare', 'compareValue' => $this->spaceName],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'confirmSpaceName' => Yii::t('SpaceModule.manage', 'Space name'),
        ];
    }

}
