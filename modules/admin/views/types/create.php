<?php

use yii\bootstrap5\Html;

/** @var yii\web\View $this */
/** @var app\models\Types $model */

$this->title = 'Создать группу товаров';

?>
<div class="types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'category' => $category,
    ]) ?>

</div>
