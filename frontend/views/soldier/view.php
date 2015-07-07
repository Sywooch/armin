<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Rank;
use common\models\Position;

/* @var $this yii\web\View */
/* @var $model common\models\Soldier */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Службовець', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="soldier-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Правити', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Ви впевнені що хочете видалити цього службовця?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'nickname',
            [
                'attribute' => 'rank',
                'value' => Rank::getTextValue($model->rank)
            ],
            [
                'attribute' => 'unit',
                'value' => $model->getUnitLink(),
                'format' => 'html'
            ],
            [
                'attribute' => 'position',
                'value' => Position::getTextValue($model->position),
            ],

            'phone',
//            'photos',
//            'primary_photo',
            'email:email',
        ],
    ]) ?>

</div>
