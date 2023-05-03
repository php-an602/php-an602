<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\installer\forms;

use Yii;

/**
 * Sample Data Form
 *
 * @since 0.5
 */
class SampleDataForm extends \yii\base\Model
{

    /**
     * @var boolean create sample data
     */
    public $sampleData;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sampleData'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sampleData' => Yii::t('InstallerModule.base', 'Set up example content (recommended)'),
        ];
    }

}
