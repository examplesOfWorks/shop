<?php

use yii\bootstrap5\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\Order $model */

$this->title = $model->id;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <div class="breadcrumb-area-3 pt-215 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">     
                    <div class="breadcrumb-wrapper-2 text-center">
                        <h3><h1>ID заказа: <?= Html::encode($this->title) ?></h1></h3>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
<!-- breadcrumb area end -->

<!-- checkout-area start -->
<?php //Pjax::begin(); ?>


    <div class="container">

        <?= DetailView::widget([
                // 'model' => $orderItems,
                // $dataProvider = new ArrayDataProvider(['allModels' => $orderItems]),
                'model' => $model,
                'attributes' => [
                    [
                        'attribute' => 'user_id',
                        'value' => function ($model) {
                                return $model->user->name . ' ' . $model->user->patronymic . ' ' . $model->user->surname;
                            }
                    ],
                    [
                        'attribute' => 'Состав заказа',
                        'format' => 'raw',
                            'value' => function ($orderItems) use ($dataProvider) {
                                return GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    // 'filterModel' => $searchModel,
                                    'columns' => [
                                        // ['class' => 'yii\grid\SerialColumn'],
                                        [
                                            'label' => 'Название товара',
                                            'format' => 'raw',
                                            'value' => function ($model) {
                                                // VarDumper::dump($model['title'], 10, true);
                                                // die;
                                                return $model['title'];
                                            }
                                        ],
                                        [
                                            'label' => 'Цена (руб.)',
                                            'format' => 'raw',
                                            'value' => function ($model) {
                                                return $model['price'];
                                            }
                                        ],
                                        [
                                            'label' => 'Количество (шт.)',
                                            'format' => 'raw',
                                            'value' => function ($model) {
                                                return $model['count'];
                                            }
                                        ],
                                        [
                                            'label' => 'Сумма (руб.)',
                                            'format' => 'raw',
                                            'value' => function ($model) {
                                                return $model['sum'];
                                            }
                                        ],
                                    ],
                                ]);
                            },
                        ],
                    ],
                ]);
            ?>
    </div>
</div>
