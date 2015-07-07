<?php

namespace common\models;

use Yii;
use common\models\Condition;
use common\models\Category;
use common\models\Attachment;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Html;

/**
 * This is the model class for table "item".
 *
 * @property string $id
 * @property string $title
 * @property string $serial
 * @property string $category_id
 * @property string $attached_to
 * @property string $attached_to_unit
 * @property string $attached_to_soldier
 * @property string $description
 * @property string $characteristics
 * @property string $doc_links
 * @property string $provided_by
 * @property integer $condition
 * @property string $fixed_by
 * @property string $date_added
 * @property string $date_updated
// * @property integer $status
 * @property string $complect
 * @property string $photos
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'serial', 'category_id', 'attached_to', 'provided_by', 'condition', 'fixed_by', 'date_added', 'date_updated', 'photos'], 'required'],
            [['title', 'description', 'characteristics', 'doc_links', 'complect'], 'string'],
            [['category_id', 'attached_to', 'attached_to_unit','attached_to_soldier', 'provided_by', 'condition', 'fixed_by', 'date_added', 'date_updated', 'status', 'photos'], 'integer'],
            [['serial'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Назва',
            'serial' => 'Серійний номер',
            'category_id' => 'Категорія',
            'attached_to' => 'На балансі у',
            'attached_to_unit' => 'Підрозділ',
            'attached_to_soldier' => 'Службовець',
            'description' => 'Опис',
            'characteristics' => 'Властивості',
            'doc_links' => 'Документація',

            'condition' => 'Стан',
//            'fixed_by' => 'Fixed By',
            'date_added' => 'Додано',
            'date_updated' => 'Редаговано',
//            'status' => 'Status',
            'complect' => 'Комплектація',
            'provided_by' => 'Волонтер',
//            'photos' => 'Фото',
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'date_added',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'date_updated',
                ],
                'value' => function() { return date('U'); } // unix timestamp
            ],
        ];
    }

    public function getConditionText()
    {
        return Condition::getTextValue($this->condition);
    }

    public function getCategoryText()
    {
        return Category::getTextValue($this->category_id);
    }

    public function getAttachedToLink()
    {
        if(Attachment::isStorehouse($this->attached_to)) {
            return 'На складі';
        }
        if(Attachment::isRepaired(($this->attached_to))) {
            return 'В ремонті';
        }
        if(Attachment::isSoldier($this->attached_to)) {
            $soldier = Soldier::findOne($this->attached_to_soldier);
            return Html::a(Html::encode("Службовець: {$soldier->nickname} ({$soldier->name})"), ['/soldier/view', 'id' => $soldier->id]);
        }
        if(Attachment::isUnit($this->attached_to)) {
            $unit = Unit::findOne($this->attached_to_unit);
            $soldier = Soldier::findOne($unit->soldier);
            return Html::a(Html::encode("Підрозділ: {$unit->name} ({$soldier->nickname}({$soldier->name}))"), ['/unit/view', 'id' => $unit->id]);
        }

        return 'undefined';
    }

    public function getProviderLink()
    {
        $p = Provider::findOne($this->provided_by);
        return Html::a(Html::encode($p->name), ['/provider/view', 'id' => $p->id]);
    }
}
