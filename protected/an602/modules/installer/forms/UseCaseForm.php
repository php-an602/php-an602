<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\installer\forms;

use Yii;

/**
 * Use Case Form
 *
 * @since 0.5
 */
class UseCaseForm extends \yii\base\Model
{

    /**
     * @var string use case
     */
    public $useCase;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['useCase'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'useCase' => Yii::t('InstallerModule.base', 'I want to use An602 for:'),
        ];
    }

}
