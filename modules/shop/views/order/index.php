<?php

use app\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\OrderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Список закаов';

?>
<section class="pb-70">
    <div class="container">

    <!-- breadcrumb area start -->
    <div class="breadcrumb-area-3 pt-215 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">     
                    <div class="breadcrumb-wrapper-2 text-center">
                        <h3><?= Html::encode($this->title) ?></h3>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'user_id',
            // 'status_id',
            [
                'attribute' => 'status_id',
                'value' => function($model){
                    return $model->status->title;
                },
            ],
            'count',
            'sum',
            [
                'label' => 'Действия',
                'format' => 'raw',
                'value' => function ($model) use ($statuses) {
                        $btn_delete = $statuses[$model->status_id] == 'Новый' ? 
                            '<div>' . Html::a('Удалить', ['delete', 'id' => $model['id']], ['class' => "btn btn-outline-danger",
                            'data' => [
                                'confirm' => 'Вы уверены, что хотите удалить заказ?',
                                'method' => 'post',
                            ],]) . '</div>'
                            : '';
                        $btn_view = '<div>' . Html::a('Просмотр', ['/shop/order/view', 'id' => $model['id']], ['class' => "btn btn-outline-primary mb-1"]) . '</div>';

                    return $btn_view . $btn_delete;
                }
            ]
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
</section>
