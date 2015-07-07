<?php

namespace common\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "unit".
 *
 * @property string $id
 * @property string $name
 * @property string $soldier
 * @property string $description
 */
class Unit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'soldier', 'description'], 'required'],
            [['soldier'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Назва',
            'soldier' => 'Відповідальний',
            'description' => 'Опис',
        ];
    }

    public function getSoldierLink() {
        $s = Soldier::findOne($this->soldier);
        return Html::a(Html::encode("{$s->nickname} ({$s->name})"), ['/soldier/view', 'id' => $s->id]);
    }
}
