<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Soldier */

$this->title = 'Додати службовця';
$this->params['breadcrumbs'][] = ['label' => 'Службовці', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="soldier-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'units' => $units
    ]) ?>

</div>
