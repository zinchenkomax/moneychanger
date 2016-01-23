<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Currency */
/* @var $billing_id array */

$this->title = 'Добавить валюту в платежную систему';
$this->params['breadcrumbs'][] = ['label' => 'Валюты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="currency-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form',
        [
            'model' => $model,
            'billing' => $billing_id,
        ]
    ) ?>

</div>