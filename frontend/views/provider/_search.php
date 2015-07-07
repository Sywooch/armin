<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\ProviderType;

/* @var $this yii\web\View */
/* @var $model common\models\ProviderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="provider-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'form-horizontal']
    ]); ?>

    <div class="form-group form-group-md">
        <?php //= $form->field($model, 'id') ?>

        <?= $form->field($model, 'type', ['options'=>['class'=>'col-md-2']])->dropDownList(ProviderType::getList()) ?>

        <?= $form->field($model, 'name', ['options'=>['class'=>'col-md-2']]) ?>

        <?php // echo $form->field($model, 'site') ?>

        <?php // echo $form->field($model, 'password') ?>

        <?php // echo $form->field($model, 'photo') ?>

        <?= Html::submitButton('Пошук', ['class' => 'btn btn-primary', 'style'=>'margin-top: 26px;']) ?>
        <?= Html::resetButton('Сбити', ['class' => 'btn btn-default', 'style'=>'margin-top: 26px;']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
