<?php

namespace common\models;

use Yii;

class Attachment extends \yii\base\Model
{
    static function getList() {
        return array(
            '' => 'Обрати',
            1 => 'На складі',
            2 => 'В ремонті',
            3 => 'Підрозділ',
            4 => 'Службовець',
        );
    }

    static function getTextValue($id)
    {
        return self::getList()[$id];
    }

    static function isUnit($id) {
        return $id == 3;
    }

    static function isSoldier($id) {
        return $id == 4;
    }

    static function isStorehouse($id) {
        return $id == 1;
    }

    static function isRepaired($id) {
        return $id == 2;
    }
}