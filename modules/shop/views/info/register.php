<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;
use yii\widgets\Pjax;


?>

<!-- login area start -->
<section class="login-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">

                <div class="basic-login">

                    <h3 class="text-center mb-60">Регистрация</h3>

                    <?php Pjax::begin([
                        'enablePushState' => false,
                        'enableReplaceState' => false,
                        'timeout' => 5000,
                    ]);?>

                            <?php $form = ActiveForm::begin(['id' => 'register-form']); ?>

                                <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label('Имя<span class="required"> **</span>') ?>

                                <?= $form->field($model, 'patronymic')->textInput(['autofocus' => true])->label('Отчество') ?>

                                <?= $form->field($model, 'surname')->textInput(['autofocus' => true])->label('Фамилия<span class="required"> **</span>') ?>

                                <?= $form->field($model, 'login', ['enableAjaxValidation' => true])->label('Логин<span class="required"> **</span>') ?>

                                <?= $form->field($model, 'email', ['enableAjaxValidation' => true])->label('email<span class="required"> **</span>') ?>

                                <?= $form->field($model, 'password')->passwordInput()->label('Пароль<span class="required"> **</span>') ?>

                                <?= $form->field($model, 'password_repeat')->passwordInput()->label('Повторите пароль<span class="required"> **</span>') ?>

                                <div class="col-md-12">
                                    <div class="checkout-form-list create-acc">
                                        <?= $form->field($model, 'rules')->checkbox(['class'=>"checkout-form-list create-acc"])
                                        ->label('Согласие на обработку персональных данных<span class="required"> **</span>') ?>
                                    </div>  
                                </div>  

                                <div class="form-group">
                                    <?= Html::submitButton('Регистрация', ['class' => 's-btn s-btn-4 w-100', 'name' => 'register-button']) ?>
                                </div>

                            <?php ActiveForm::end(); ?>
                        
                        <?php Pjax::end();?>
                </div>
            </div>
        </div>
    </div>
</section>
