<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Item */

$this->title = 'Редагувати річ: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Речі', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редагування';
?>
<div class="item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'units' => $units,
        'soldiers' => $soldiers,
        'providers' => $providers
    ]) ?>

</div>
