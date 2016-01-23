<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Currency */
/* @var $billing_id array */

$this->title = 'Изменить валюту: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Вылюты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="currency-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'billing' => $billing_id,
    ]) ?>

</div>