<?php

use yii\bootstrap5\Html;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = 'Редактировать товар: ' . $model->title;

?>
<div class="product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'types' => $types
    ]) ?>

</div>
