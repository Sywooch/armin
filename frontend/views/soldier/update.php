<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Soldier */

$this->title = 'Редагувати службовця: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Службовці', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редагування';
?>
<div class="soldier-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'units' => $units
    ]) ?>

</div>
