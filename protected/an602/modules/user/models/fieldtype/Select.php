<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2015 H u m H u b GmbH & Co. KG, PHP-AN602, The 86it Developers Network, and Yii
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\user\models\fieldtype;

use an602\modules\user\models\User;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * ProfileFieldTypeSelect handles numeric profile fields.
 *
 * @package an602.modules_core.user.models
 * @since 0.5
 */
class Select extends BaseType
{
    /**
     * @inheritdoc
     */
    public $type = 'dropdownlist';

    /**
     * All possible options.
     * One entry per line.
     * key=>value format
     *
     * @var String
     */
    public $options;

    /**
     * @inerhitdoc
     */
    public $canBeDirectoryFilter = true;

    /**
     * Rules for validating the Field Type Settings Form
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['options'], 'safe'],
        ];
    }

    /**
     * Returns Form Definition for edit/create this field.
     *
     * @return array Form Definition
     */
    public function getFormDefinition($definition = [])
    {
        return parent::getFormDefinition(ArrayHelper::merge([
                    get_class($this) => [
                        'type' => 'form',
                        'title' => Yii::t('UserModule.profile', 'Select field options'),
                        'elements' => [
                            'options' => [
                                'type' => 'textarea',
                                'label' => Yii::t('UserModule.profile', 'Possible values'),
                                'class' => 'form-control',
                                'hint' => Yii::t('UserModule.profile', 'One option per line. Key=>Value Format (e.g. yes=>Yes)')
                            ],
                        ]
        ]], $definition));
    }

    /**
     * Saves this Profile Field Type
     */
    public function save()
    {
        $columnName = $this->profileField->internal_name;
        if (!\an602\modules\user\models\Profile::columnExists($columnName)) {
            $query = Yii::$app->db->getQueryBuilder()->addColumn(\an602\modules\user\models\Profile::tableName(), $columnName, 'VARCHAR(255)');
            Yii::$app->db->createCommand($query)->execute();
        }

        return parent::save();
    }

    /**
     * Returns the Field Rules, to validate users input
     *
     * @param array $rules
     * @return array
     */
    public function getFieldRules($rules = [])
    {
        $rules[] = [$this->profileField->internal_name, 'in', 'range' => array_keys($this->getSelectItems())];
        return parent::getFieldRules($rules);
    }

    /**
     * @inheritdoc
     */
    public function getFieldFormDefinition(User $user = null, array $options = []): array
    {
        return parent::getFieldFormDefinition($user, array_merge([
            'items' => $this->getSelectItems(),
            'prompt' => Yii::t('UserModule.profile', 'Please select:'),
        ], $options));
    }

    /**
     * Returns a list of possible options
     *
     * @return array
     */
    public function getSelectItems()
    {
        $items = [];

        foreach (explode("\n", $this->options) as $option) {

            if (strpos($option, "=>") !== false) {
                list($key, $value) = explode("=>", $option);
                $items[trim($key)] = Yii::t($this->profileField->getTranslationCategory(), trim($value));
            } else {
                $items[] = $option;
            }
        }

        return $items;
    }

    /**
     * @inheritdoc
     */
    public function getUserValue(User $user, $raw = true): ?string
    {
        $internalName = $this->profileField->internal_name;
        $value = $user->profile->$internalName;

        if (!$raw) {
            $options = $this->getSelectItems();
            if (isset($options[$value])) {
                return \yii\helpers\Html::encode(Yii::t($this->profileField->getTranslationCategory(), $options[$value]));
            }
        }

        return $value;
    }

}
