<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Item */

$this->title = 'Додати річ';
$this->params['breadcrumbs'][] = ['label' => 'Речі', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'units' => $units,
        'soldiers' => $soldiers,
        'providers' => $providers
    ]) ?>

</div>
