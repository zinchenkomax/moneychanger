<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Rate */

$this->title = sprintf( "%s - %s в %s - %s",
    $model->fromCurrency->billing->name,
    $model->fromCurrency->name,
    $model->toCurrency->billing->name,
    $model->toCurrency->name
);
$this->params['breadcrumbs'][] = ['label' => 'Курсы валют', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="rate-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот курс?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'from_currency_id',
            'to_currency_id',
            'from_amount',
            'to_amount',
        ],
    ]) ?>

</div>