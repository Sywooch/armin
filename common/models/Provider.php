<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "provider".
 *
 * @property string $id
 * @property integer $type
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $site
 * @property string $password
 * @property string $photo
 */
class Provider extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'provider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'name'], 'required'],
            [['type', 'photo'], 'integer'],
            [['name', 'phone', 'email', 'site', 'password'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Тип',
            'name' => "Iм'я",
            'phone' => 'Телефон',
            'email' => 'Електронна пошта',
            'site' => 'Сайт',
            'password' => 'Пароль',
            'photo' => 'Photo',
        ];
    }

    public function getTypeText() {
        return ProviderType::getTextValue($this->type);
    }
}
