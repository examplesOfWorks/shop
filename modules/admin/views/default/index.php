<?php

use app\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\AdminSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Управление заказами';

?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Управление категориями', ['category/index'], ['class' => 'btn btn-success']) ?>

        <?= Html::a('Управление группами товаров', ['types/index'], ['class' => 'btn btn-success']) ?>

        <?= Html::a('Управление товарами', ['product/index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(
        ['enablePushState' => false, 
        'enableReplaceState' => false]
    ); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Номер заказа',
                'attribute' => 'id',
                'value' => function ($model) {
                        return $model->id;
                    }
            ],
            [
                'attribute' => 'user_id',
                'value' => function ($model) {
                        return $model->user->name . ' ' . $model->user->patronymic . ' ' . $model->user->surname;
                    }
            ],
            [
                'attribute' => 'status_id',
                'value' => fn($model) => $statuses[$model->status_id],
                'filter' => $statuses,
            ],
            'count',
            'sum',
            [
                'label' => 'Действия',
                'format' => 'raw',
                'value' => function ($model) use ($statuses) {
                        $btn_delete = $statuses[$model->status_id] == 'Новый' ? 
                            '<div>' . Html::a('Отменить', ['reason', 'id' => $model['id']], ['class' => "btn btn-outline-danger"]) . '</div>'
                            : '';

                        $btn_applay = $statuses[$model->status_id] == 'Новый' ? 
                            '<div>' . Html::a('Подтвердить', ['confirm', 'id' => $model['id']], ['class' => "btn btn-outline-success"]) . '</div>'
                            : '';
                        $btn_view = '<div>' . Html::a('Просмотр', ['/admin/default/view', 'id' => $model['id']], ['class' => "btn btn-outline-primary"]) . '</div>';

                        return $btn_applay . $btn_delete . $btn_view;

                }
            ]
            //'reason',
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
