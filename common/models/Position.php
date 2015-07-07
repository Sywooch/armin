<?php

namespace common\models;

use Yii;

class Position extends \yii\base\Model
{
    static function getList() {
        return array(
            '' => 'Обрати',
            1 => 'Стрілець',
            2 => 'Старшина',
            3 => 'Командир взводу',
            4 => 'Командир роти'
        );
    }

    static function getTextValue($id)
    {
        return self::getList()[$id];
    }
}