<?php

namespace common\models;

use Yii;

class Category extends \yii\base\Model
{
    static function getList() {
        return array(
            '' => 'Обрати',
            1 => 'Електроніка',
            2 => 'Оптика',
            3 => 'Електронна оптика',
            4 => 'Амуніція'
        );
    }

    static function getTextValue($id)
    {
        return self::getList()[$id];
    }
}