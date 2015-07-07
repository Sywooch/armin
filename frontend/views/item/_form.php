<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Category;
use common\models\Condition;
use common\models\Attachment;

/* @var $this yii\web\View */
/* @var $model common\models\Item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group col-md-4">
        <?= $form->field($model, 'title', ['options'=>['class'=>'']])->textarea(['rows' => 1]) ?>
        <?= $form->field($model, 'complect', ['options'=>['class'=>'']])->textarea(['rows' => 1]) ?>
        <?= $form->field($model, 'description', ['options'=>['class'=>'']])->textarea(['rows' => 1]) ?>
        <?= $form->field($model, 'characteristics', ['options'=>['class'=>'']])->textarea(['rows' => 1]) ?>
        <?= $form->field($model, 'doc_links', ['options'=>['class'=>'']])->textarea(['rows' => 1]) ?>
    </div>
    <div class="form-group col-md-4">
        <?= $form->field($model, 'category_id', ['options'=>['class'=>'']])->dropDownList(Category::getList()) ?>
        <?= $form->field($model, 'serial', ['options'=>['class'=>'']])->textInput(['maxlength' => true]) ?>
        <?php /* = $form->field($model, 'status', ['options'=>['class'=>'']])->textInput() */ ?>
        <?= $form->field($model, 'condition', ['options'=>['class'=>'']])->dropDownList(Condition::getList()) ?>
        <?= $form->field($model, 'provided_by', ['options'=>['class'=>'']])->dropDownList($providers) ?>
        <?php /* = $form->field($model, 'fixed_by', ['options'=>['class'=>'']])->textInput(['maxlength' => true]) */ ?>
    </div>
    <div class="form-group col-md-4">
        <?= $form->field($model, 'attached_to', ['options'=>['class'=>'']])->dropDownList(Attachment::getList()) ?>
        <?= $form->field($model, 'attached_to_unit', ['options'=>['class'=>'']])->dropDownList($units) ?>
        <?= $form->field($model, 'attached_to_soldier', ['options'=>['class'=>'']])->dropDownList($soldiers) ?>
    </div>
    <?php /* = $form->field($model, 'photos', ['options'=>['class'=>'form-group col-md-12']])->textInput(['maxlength' => true]) */ ?>

    <div class="form-group col-md-12">
        <?= Html::submitButton($model->isNewRecord ? 'Додати' : 'Зберегти', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php $this->registerJs('
            $("#item-attached_to").bind("redrawSubselects", function () {
                $(".field-item-attached_to_soldier").addClass("hidden");
                $(".field-item-attached_to_unit").addClass("hidden");
                var val = $(this).val();
                if (val == "3") {
                    $(".field-item-attached_to_unit").removeClass("hidden");
                }
                if (val == "4") {
                    $(".field-item-attached_to_soldier").removeClass("hidden");
                }
            });

            $("#item-attached_to").trigger("redrawSubselects");

            $("#item-attached_to").change(function () {
                $(this).trigger("redrawSubselects");
            });
     ');?>
</div>
