<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Unit */

$this->title = 'Створити підрозділ';
$this->params['breadcrumbs'][] = ['label' => 'Підрозділи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'soldiers' => $soldiers
    ]) ?>

</div>
