<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Category;
use common\models\Attachment;

/* @var $this yii\web\View */
/* @var $model common\models\ItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'form-horizontal']
    ]); ?>

    <?php //= $form->field($model, 'id') ?>

    <div class="form-group form-group-md">
        <?= $form->field($model, 'title', ['options'=>['class'=>'col-md-2']]) ?>
        <?= $form->field($model, 'serial', ['options'=>['class'=>'col-md-2']]) ?>
        <?= $form->field($model, 'category_id', ['options'=>['class'=>'col-md-2']])->dropDownList(Category::getList()) ?>
        <?= $form->field($model, 'attached_to', ['options'=>['class'=>'col-md-2']])->dropDownList(Attachment::getList()) ?>
        <?= $form->field($model, 'attached_to_unit', ['options'=>['class'=>'col-md-2']])->dropDownList($units) ?>
        <?= $form->field($model, 'attached_to_soldier', ['options'=>['class'=>'col-md-2']])->dropDownList($soldiers) ?>
        <?= Html::submitButton('Пошук', ['class' => 'btn btn-primary', 'style'=>'margin-top: 26px;']) ?>
        <?= Html::resetButton('Сбити', ['class' => 'btn btn-default', 'style'=>'margin-top: 26px;']) ?>
    </div>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'characteristics') ?>

    <?php // echo $form->field($model, 'doc_links') ?>

    <?php // echo $form->field($model, 'provided_by') ?>

    <?php // echo $form->field($model, 'condition') ?>

    <?php // echo $form->field($model, 'fixed_by') ?>

    <?php // echo $form->field($model, 'date_added') ?>

    <?php // echo $form->field($model, 'date_updated') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'complect') ?>

    <?php // echo $form->field($model, 'photos') ?>


    <?php ActiveForm::end(); ?>

    <?php $this->registerJs('
            $("#itemsearch-attached_to").bind("redrawSubselects", function () {
                $(".field-itemsearch-attached_to_soldier").addClass("hidden");
                $(".field-itemsearch-attached_to_unit").addClass("hidden");
                var val = $(this).val();
                if (val == "3") {
                    $(".field-itemsearch-attached_to_unit").removeClass("hidden");
                }
                if (val == "4") {
                    $(".field-itemsearch-attached_to_soldier").removeClass("hidden");
                }
            });

            $("#itemsearch-attached_to").trigger("redrawSubselects");

            $("#itemsearch-attached_to").change(function () {
                $(this).trigger("redrawSubselects");
            });
     ');?>
</div>
