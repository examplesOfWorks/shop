<?php

use yii\bootstrap5\Html;
use yii\grid\GridView;
use yii\helpers\VarDumper;
use yii\bootstrap5\ActiveForm;
use app\widgets\Alert;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\Order $model */

$this->title = 'Оформление заказа';

// $this->params['breadcrumbs'][] = $this->title;
?>

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

<!-- checkout-area start -->
<?php //Pjax::begin(); ?>

<section class="checkout-area pb-70">
    <div class="container">
        <form action="#">
            <div class="d-flex justify-content-center">
                <div class="col-lg-6">

                    <div class="your-order mb-30 ">
                        <h3>Ваш заказ</h3>

                        
                        <div class="your-order-table table-responsive">  

                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'pager' => ['class' => \yii\bootstrap5\LinkPager::class],
                                'tableOptions' => [
                                        'class' => ''
                                ],
                                'layout' => "{items}",
                                'showFooter' => true,
                                'columns' => [
                                    [
                                        'format' => 'raw',
                                        'label' => 'Товар',
                                        'contentOptions' => ['class' => 'product-name'],
                                        'value' => function ($model) {
                                            return $model['title']. '<strong class="product-quantity"> × '. $model['count'] .'</strong>';
                                        },
                                        'footerOptions' => ['class' => 'order-total'],
                                        'footer' => 'Итого:',
                                    ],
                                    [
                                        'format' => 'raw',
                                        'label' => 'Сумма (руб.)',
                                        'contentOptions' => ['class' => 'product-total'],
                                        'value' => function ($model) {
                                            return '<span class="amount">'. $model['sum'] .'</span>';
                                        },    
                                        'footer' => '<strong><span class="amount">'. $cart['sum'] .'</span></strong>',
                                    ],
                                ],
                            ]); ?>

                        </div>

                        <div class="payment-method">
                            <div class="order-button-payment mt-20">

                                


                                <?php //$form = ActiveForm::begin([
                                    //     'id' => 'confirm-form',
                                    //     'options' => ['data-pjax' => true]
                                    // ]); ?>

                                <?# Alert::widget() ?>

                                <?# $form->field($login, 'password')->passwordInput() ?>

                                <?# Html::submitButton('Подтвердить заказ', ['class' => 's-btn s-btn-2', 'name' => 'confirm-button', 'id' => 'agree']) ?>

                                <?= Html::a('Подтвердить заказ', ['order'], ['class' => 's-btn s-btn-2']) ?>
                                
                                <?php //ActiveForm::end(); ?>
                                
                                

                                <!-- <button type="submit" class="s-btn s-btn-2">Подтвердить заказ</button> -->
                                <?# Html::submitButton('Подтвердить заказ', ['class' => 's-btn s-btn-2', 'name' => 'confirm-button', 'id' => 'agree']) ?>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
</section>
<?php //Pjax::end(); ?>
<!-- checkout-area end -->
