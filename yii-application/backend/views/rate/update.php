<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rate */
/* @var $currency array */

$this->title = 'Изменить курс: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'currency' => $currency,
    ]) ?>

</div>