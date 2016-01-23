<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Rate */
/* @var $currency array */

$this->title = 'Добавить курс';
$this->params['breadcrumbs'][] = ['label' => 'Курсы валют', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'currency' => $currency,
    ]) ?>

</div>