<?php

use yii\bootstrap5\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = $model->title;

\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

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

    

    <section class="checkout-area pb-70">

    <?php Pjax::begin(['id' => 'card-pjax']); ?>

        <div class="container">

            <div class="row">
                <div class="col-6">
                    <div class="tab-content mb-10" id="productModalThumb">

                        <div class="d-flex justify-content-center">
                            <div class="product__modal-thumb w-img" style="width: 20rem;">
                                <?= "<img src='". Yii::getAlias('@web') . '/img/' . $model->photo ."'>" ?>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-6">
                    <h3 class="product__modal-title">
                        <a href="product-details.html"><?= $model->title ?></a>
                    </h3>
                    <div class="product__modal-price mb-10">
                        <span class="price new-price"><?= $model->price ?> руб.</span> 
                    </div>
                    <div class="product__modal-available">
                        <p> В наличии <span><?= $model->count ?></span> шт. </p>
                    </div>
                    <div class="product__modal-des">
                        <p><?= $model->description ?></p>
                        <p>Цвет: <?= $model->color ?></p>
                        <p>Размер: <?= $model->size ?></p>
                    </div>

                    
                </div>              
            </div>
        </div>

        <?php Pjax::end(); ?>

    </section>


    
</div>


