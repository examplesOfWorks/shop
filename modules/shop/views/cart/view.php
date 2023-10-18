<?php

use yii\grid\GridView;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\widgets\Pjax;
use yii\widgets\ListView;
use yii\helpers\VarDumper;

?>

<!-- cart mini area start -->

    <div class="modal-dialog">
            <div class="modal-content"> 

                <div class="cartmini__wrapper">


                <?php if (!empty($cart['count'])): ?>

                    <?php Pjax::begin(['enablePushState' => false, 'enableReplaceState' => false]); ?>

                    <?# ListView::widget([
                        // 'action' => $url,
                    //     'options' => ['data-pjax' => true],
                    //     'id' => 'form-cart',
                    //     'dataProvider' => $dataProvider,
                    //     // 'itemOptions' => ['class' => '<div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-6">'],
                    //     'itemView' => function ($model, $key, $index, $widget) {
                    //         VarDumper::dump($model, 10, true); die;
                    //             // return $model->title;

                    //         },
                    // ]) ?>
                        

                        <?php ActiveForm::begin([
                            'action' => $url,
                            'options' => ['data-pjax' => true],
                            'id' => 'form-cart',
                            // 'dataProvider' => $dataProvider,
                        ]) ?>

                        <?= ListView::widget([
                            'dataProvider' => $dataProvider,
                            'itemOptions' => ['class' => 'cartmini__item p-rel d-flex align-items-start'],
                            'layout' => "{items}",
                            'itemView' => function ($model, $key, $index, $widget) use ($url, $cart) {
                                // VarDumper::dump($cart, 10, true); die;
                                $minus = $url . 'id=' . $model['id'] . '&btn=minus';
                                $plus = $url . 'id=' . $model['id'] . '&btn=plus';
                                return '<div class="cartmini__thumb mr-15">
                                            <a href="product-details.html">
                                                <img src="'. Yii::getAlias('@web') . '/img/' . $model['photo'] .'" alt="'. $model['title'] .'">
                                            </a>
                                        </div>
                                        <div class="cartmini__content">
                                            <h3 class="cartmini__title">
                                                <a href="product-details.html">'. $model['title'] .'</a>
                                            </h3>
                                            <span class="cartmini__price">
                                                <span class="price">'. $model['count'] .' × '. $model['price'] .'</span>
                                            </span>
                                            <div class="product-quantity">
                                                <div class="cart-plus-minus">
                                                    
                                                    <input type="text" value="'. $model['count'] .'" />
                                                    <div class="dec qtybutton">'
                                                        . Html::a('-', [$minus], ["data-method" => "post"]) . 
                                                    '</div>
                                                    <div class="inc qtybutton">'
                                                        . Html::a('+', [$plus], ["data-method" => "post"]) . 
                                                    '</div>
                                                </div>
                                            </div>
                                            '.$model['sum'].'
                                        </div>'
                                        . Html::a('<i class="fal fa-times"></i>',
                                                [$url . "id=" . $model["id"] . "&btn=trash"],
                                                [
                                                    "class" => "cartmini__remove",
                                                    "data-id" => $model["id"],
                                                    "data-method" => "post",
                                                ]);
                                },
                        ]) ?>

                    <?php ActiveForm::end() ?>

                    <div class="cartmini__total d-flex align-items-center justify-content-between">
                        <h5>Итого:</h5>
                        <span><?= $cart['sum'] ?> руб.</span>
                        (<?= $cart['count'] ?> шт.)
                    </div>
                    <div class="cartmini__bottom">

                    <?= (!(Yii::$app->user->isGuest || Yii::$app->user->identity->isAdmin)) ?
                    
                        '<a href="/shop/order/create" class="s-btn w-100 mb-20">Оформить заказ</a>' :

                        'Для оформления заказа, пожалуйста, <a href="/shop/info/login" class="d-xxl-inline-block"><u>войдите</u></a>' ?>
   
                    </div>

                    <?php Pjax::end(); ?>

                <?php else: ?>

                    <div>Ваша корзина пуста</div>   

                <?php endif; ?>
                
                    <!-- <div class="cartmini__top d-flex align-items-center justify-content-between">
                        <h4>Your Cart</h4>
                        <div class="cartminit__close">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#cartMiniModal" class="cartmini__close-btn"> <i class="fal fa-times"></i></button>
                        </div>
                    </div> -->

                    <!-- <div class="cartmini__list">
                        <ul>
                            <li class="cartmini__item p-rel d-flex align-items-start">
                                <div class="cartmini__thumb mr-15">
                                    <a href="product-details.html">
                                        <img src="/assets/img/products/product-1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="cartmini__content">
                                    <h3 class="cartmini__title">
                                        <a href="product-details.html">Form Armchair Walnut Base</a>
                                    </h3>
                                    <span class="cartmini__price">
                                        <span class="price">1 × $70.00</span>
                                    </span>
                                </div>
                                <a href="#" class="cartmini__remove">
                                    <i class="fal fa-times"></i>
                                </a>
                            </li>
                            <li class="cartmini__item p-rel d-flex align-items-start">
                                <div class="cartmini__thumb mr-15">
                                    <a href="product-details.html">
                                        <img src="/assets/img/products/product-2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="cartmini__content">
                                    <h3 class="cartmini__title">
                                        <a href="product-details.html">Form Armchair Simon Legald</a>
                                    </h3>
                                    <span class="cartmini__price">
                                        <span class="price">1 × $95.99</span>
                                    </span>
                                </div>
                                <a href="#" class="cartmini__remove">
                                    <i class="fal fa-times"></i>
                                </a>
                            </li>
                            <li class="cartmini__item p-rel d-flex align-items-start">
                                <div class="cartmini__thumb mr-15">
                                    <a href="product-details.html">
                                        <img src="/assets/img/products/product-3.jpg" alt="">
                                    </a>
                                </div>
                                <div class="cartmini__content">
                                    <h3 class="cartmini__title">
                                        <a href="product-details.html">Antique Chinese Armchairs</a>
                                    </h3>
                                    <span class="cartmini__price">
                                        <span class="price">1 × $120.00</span>
                                    </span>
                                </div>
                                <a href="#" class="cartmini__remove">
                                    <i class="fal fa-times"></i>
                                </a>
                            </li>
                        </ul>
                    </div> -->

                    <!-- <div class="cartmini__total d-flex align-items-center justify-content-between">
                        <h5>Total</h5>
                        <span>$180.00</span>
                    </div>
                    <div class="cartmini__bottom">
                        <a href="cart.html" class="s-btn w-100 mb-20">view cart</a>
                        <a href="checkout.html" class="s-btn s-btn-2 w-100">checkout</a>
                    </div> -->

                </div>

             </div>
            </div>

    <!-- cart mini area end -->




            