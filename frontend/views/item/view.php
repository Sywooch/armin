<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Item */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Речі', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Правити', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Ви впевнені що хочете видалити це?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'category_id',
                'value' => $model->getCategoryText(),
            ],
            'serial',
            [
                'attribute' => 'attached_to',
                'value' => $model->getAttachedToLink(),
                'format' => 'html'
            ],
            [
                'attribute' => 'condition',
                'value' => $model->getConditionText()
            ],
            'complect:ntext',
            'description:ntext',
            'characteristics:ntext',
            'doc_links:ntext',
            [
                'attribute' => 'provided_by',
                'value' => $model->getProviderLink(),
                'format' => 'html'
            ],

//            'fixed_by',
            [
                'attribute' => 'date_added',
                'format' => 'datetime'
            ],
            [
                'attribute' => 'date_updated',
                'format' => 'datetime'
            ]
//            'status',
//            'photos',
        ],
    ]) ?>

</div>
