<?php

namespace common\models;

use Yii;

class Condition extends \yii\base\Model
{
    static function getList()
    {
        return array(
            '' => 'Обрати',
            1 => 'Новий',
            2 => 'Добрий',
            3 => 'Довільний',
            4 => 'Злий',
            5 => 'В ремонті',
        );
    }

    static function getTextValue($id)
    {
        return self::getList()[$id];
    }
}