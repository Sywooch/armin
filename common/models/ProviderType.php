<?php

namespace common\models;

use Yii;

class ProviderType extends \yii\base\Model
{
    static function getList() {
        return array(
            '' => 'Обрати',
            1 => 'Приватна особа',
            2 => 'Службовець',
            3 => 'Організація',
            4 => 'Військова частина'
        );
    }

    static function getTextValue($id)
    {
        return self::getList()[$id];
    }
}