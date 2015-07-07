<?php

namespace common\models;

use Yii;

use common\models\Unit;
use yii\helpers\Html;

/**
 * This is the model class for table "soldier".
 *
 * @property string $id
 * @property string $name
 * @property string $nickname
 * @property integer $rank
 * @property integer $position
 * @property integer $unit
 * @property string $phone
 * @property integer $photos
 * @property integer $primary_photo
 * @property string $email
 * @property string $password
 */
class Soldier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'soldier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'nickname'], 'required'],
            [['rank', 'position', 'unit', 'photos', 'primary_photo'], 'integer'],
            [['name', 'nickname', 'email', 'password'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 12],
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => "Iм'я",
            'nickname' => 'Псевдо',
            'rank' => 'Звання',
            'position' => 'Посада',
            'unit' => 'Підрозділ',
            'phone' => 'Номер телефону',
            'photos' => 'Photos',
            'primary_photo' => 'Primary Photo',
            'email' => 'Електронна пошта',
            'password' => 'Пароль',
        ];
    }

    public function getUnitLink()
    {
        if($this->unit) {
            $p = Unit::findOne($this->unit);
            if($p) {
                return Html::a(Html::encode($p->name), ['/unit/view', 'id' => $p->id]);
            }
        }
    }
}
