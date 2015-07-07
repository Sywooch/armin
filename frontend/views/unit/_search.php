<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UnitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'form-horizontal']
    ]); ?>

    <div class="form-group form-group-md">

    <?= $form->field($model, 'name', ['options'=>['class'=>'col-md-2']]) ?>

    <?= $form->field($model, 'soldier', ['options'=>['class'=>'col-md-2']])->dropDownList($soldiers) ?>

    <?= Html::submitButton('Пошук', ['class' => 'btn btn-primary', 'style'=>'margin-top: 26px;']) ?>
    <?= Html::resetButton('Сбити', ['class' => 'btn btn-default', 'style'=>'margin-top: 26px;']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
