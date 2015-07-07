<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Rank;
use common\models\Position;

/* @var $this yii\web\View */
/* @var $model common\models\SoldierSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="soldier-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'form-horizontal']
    ]); ?>

    <div class="form-group form-group-md">
    <?php //= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name', ['options'=>['class'=>'col-md-2']]) ?>

    <?= $form->field($model, 'nickname', ['options'=>['class'=>'col-md-2']]) ?>

    <?= $form->field($model, 'rank', ['options'=>['class'=>'col-md-2']])->dropDownList(Rank::getList()) ?>

    <?= $form->field($model, 'position', ['options'=>['class'=>'col-md-2']])->dropDownList(Position::getList()) ?>

    <?= $form->field($model, 'unit', ['options'=>['class'=>'col-md-2']])->dropDownList($units) ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'photos') ?>

    <?php // echo $form->field($model, 'primary_photo') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?= Html::submitButton('Пошук', ['class' => 'btn btn-primary', 'style'=>'margin-top: 26px;']) ?>
    <?= Html::resetButton('Сбити', ['class' => 'btn btn-default', 'style'=>'margin-top: 26px;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
