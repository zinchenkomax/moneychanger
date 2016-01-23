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

            [
                'label' => 'Базовая валюта',
                'value' => function ($data) { return sprintf( "%s - %s",
                    $data->fromCurrency->billing->name,
                    $data->fromCurrency->name
                    );
                },
            ],

            [
                'label' => 'Валюта конвертации',
                'value' => function ($data) { return sprintf( "%s - %s",
                    $data->toCurrency->billing->name,
                    $data->toCurrency->name
                    );
                },
            ],
            'from_amount',
            'to_amount',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>