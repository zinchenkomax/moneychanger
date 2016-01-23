<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Billing */

$this->title = 'Изменить платежную систему: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Платежные системы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="billing-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>