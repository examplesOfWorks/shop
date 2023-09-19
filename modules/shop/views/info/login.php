<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
?>


        <!-- login area start -->
        <section class="login-area pt-100 pb-100">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 offset-lg-2">
                        <div class="basic-login">
                           <h3 class="text-center mb-60">Авторизация</h3>

                           <?php $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'layout' => 'horizontal',
                            'fieldConfig' => [
                                'template' => "{label}\n{input}\n{error}",
                                'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                                'inputOptions' => ['class' => 'col-lg-3 form-control'],
                                'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                            ],
                        ]); ?>

                            <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($model, 'password')->passwordInput() ?>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <?= Html::submitButton('Вход', ['class' => 's-btn s-btn-4 w-100', 'name' => 'login-button']) ?>
                                </div>
                            </div>

                            <div class="or-divide"><span>или</span></div>
                              <a href="/shop/info/register" class="s-btn s-btn-2 w-100">Регистрация</a>

                        <?php ActiveForm::end(); ?>
                        </div>
                  </div>
               </div>
            </div>
         </section>
        <!-- login area end -->

        