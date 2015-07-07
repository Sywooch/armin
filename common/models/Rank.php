<?php

namespace common\models;

use Yii;

class Rank extends \yii\base\Model
{
    static function getList() {
        return array(
            '' => 'Обрати',
            1 => 'Солдат',
            2 => 'Старший солдат',
            3 => 'Молодший сержант',
            4 => 'Сержант',
            5 => 'Старший сержант',
            6 => 'Старшина',
            7 => 'Прапорщик',
            8 => 'Старший прапорщик',
            9 => 'Молодший лейтенант',
            10 => 'Лейтенант',
            11 => 'Старший лейтенант',
            12 => 'Капітан',
            13 => 'Майор',
            14 => 'Підполковник',
            15 => 'Полковник',
        );
    }

    static function getTextValue($id)
    {
        return self::getList()[$id];
    }
}