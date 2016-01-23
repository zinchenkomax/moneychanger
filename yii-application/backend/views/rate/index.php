<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Rate */

$this->title = 'Курсы валют';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rate-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить курс', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'from_currency_id',
            [
                'label' => 'Базовая валюта',
                'value' => 'fromCurrency.billing.name',
            ],
            [
                'label' => 'Валюта конвертации',
                'value' => 'toCurrency.name',
            ],
//            'to_currency_id',
            'from_amount',
            'to_amount',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>