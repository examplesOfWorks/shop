<?php

use app\models\Product;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\bootstrap5\Modal;
/** @var yii\web\View $this */
/** @var app\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Каталог товаров';

?>

<!-- <div class="product-index"> -->

    <!-- breadcrumb area start -->
    <div class="breadcrumb-area pt-255 pb-265 mb-120" data-background="assets/img/banner/breadcrumb.jpg">
        <div class="container">
            <div class="breadcrumb-title text-center">
                <h2><?= Html::encode($this->title) ?></h2>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- shop area start -->
    <div class="shop-area mb-70">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-3 col-xl-3 col-lg-4">
                        <div class="shop-sidebar-area pt-7 pr-60">
                            <div class="single-widget pb-50 mb-50">
                                <h4 class="widget-title">Группы товаров</h4>
                                <div class="widget-category-list">
                                    <?php echo $this->render('_search', ['model' => $searchModel, 'types' => $types]); ?>
                                </div>
                            </div>
                             <div class="single-widget mb-50">
                                <h4 class="widget-title title-price-space">Сортировка</h4>
                                <div class="sort item"><?= $dataProvider->sort->link('price') ?></div>
                                <br>
                            </div> 
                        </div>
                    </div>
                    <div class="col-xxl-9 col-xl-9 col-lg-8 order-first order-lg-last">

                        <?php Pjax::begin(['id' => 'catalog-pjax', 'enablePushState' => false, 'enableReplaceState' => false, 'timeout' => 5000]); ?>

                            <div class="shop-main-area">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade  show active" id="tab1">
                                        <?= ListView::widget([
                                            'dataProvider' => $dataProvider,
                                            'itemOptions' => ['class' => '<div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-6">'],
                                            'layout' =>'               
                                            <div class="row pb-20">  
                                                {items}
                                            </div>',
                                
                                            'itemView' => function ($model, $key, $index, $widget) {
                                                                
                                            return '<div class="single-product mb-15 wow fadeInUp" data-wow-delay=".1s">
                                                        <div class="product-thumb">'
                                                        . "<img src='". Yii::getAlias('@web') . '/img/' . $model->photo ."' alt='". $model->title ."'>"
                                                            .'<div class="cart-btn cart-btn-1 p-abs">
                                                                <a href="#" data-id="'. $model->id .'" data-count="1" class="add-to-cart"> Добавить в корзину </a>
                                                            </div>
                                                            <div class="product-action product-action-1 p-abs">' .
                                                                                        
                                                                Html::a('<i class="fal fa-eye"></i><i class="fal fa-eye"></i>', ['view', 'id' => $model->id], ['class'=>"icon-box icon-box-1"])
                                                                                        
                                                                . '</div>
                                                        </div>
                                                        <div class="product-content">
                                                            <h4 class="pro-title pro-title-1">'. Html::a(Html::encode($model->title), ['view', 'id' => $model->id]) .'</h4>
                                                            <div class="pro-price">
                                                                <span>'. Html::encode($model->price) .' руб.</span>
                                                            </div>
                                                        </div>
                                                    </div>';
                                                            
                                            },
                                        ]) ?>
                                    </div>
                                </div>
                            </div>

                        <?php Pjax::end(); ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- shop area end -->

        <?php
           
            Modal::begin([
                'title' => '<h3>Информация о товаре</h3>',
                'options' => ['id' => 'productModal', 'class' => 'product__modal-area modal fade', 'tabindex' => "-1", 'role' => "dialog", 
                'aria-labelledby' => "productModal", 'aria-hidden' => "true"],
                'bodyOptions' => ['id' => 'body-card'],
                ]);
            
                Pjax::begin(['id' => 'card-pjax', 'enablePushState' => false, 'timeout' => 5000]);
                Pjax::end();

            Modal::end();

    ?>
