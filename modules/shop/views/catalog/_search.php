<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?# $form->field($model, 'id') ?>

    <?= $form->field($model, 'type_id')->dropdownList($types, ['prompt' => 'Выберите группу товара']) ?>

    <?# $form->field($model, 'title') ?>

    <?# $form->field($model, 'price') ?>

    <?# $form->field($model, 'count') ?>

    <?# $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <div class="form-group">
        <div class="row">
            <div class="col-6">
                <?= Html::submitButton('Поиск', ['class' => 's-btn s-btn-2 w-100']) ?>
            </div>
            <div class="col-6">
                <?= Html::a('Сброс', ['catalog/index'], ['class' => 's-btn w-100 mb-20']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
