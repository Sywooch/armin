<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Rank;
use common\models\Position;

/* @var $this yii\web\View */
/* @var $model common\models\Soldier */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="soldier-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rank')->dropDownList(Rank::getList()) ?>

    <?= $form->field($model, 'unit')->dropDownList($units) ?>

    <?= $form->field($model, 'position')->dropDownList(Position::getList()) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?php /*= $form->field($model, 'photos')->textInput() */?>

    <?php /*= $form->field($model, 'primary_photo')->textInput() */?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php /*= $form->field($model, 'password')->passwordInput(['maxlength' => true]) */?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Створити' : 'Зберегти', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
