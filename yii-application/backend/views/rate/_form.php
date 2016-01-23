<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Rate */
/* @var $form yii\widgets\ActiveForm */
/* @var $currency array */
?>

<div class="rate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'from_currency_id' )->dropDownList(
        $currency,
        [ ['id' => 'name'],  'prompt'=>'Выберите базовую валюту' ]
    )->label('Базовая валюта'); ?>

    <?= $form->field($model, 'to_currency_id' )->dropDownList(
        $currency,
        [ ['id' => 'name'],  'prompt'=>'Выберите валюту конвертации' ]
    )->label('Валюта конвертации'); ?>

    <?= $form->field($model, 'from_amount')->textInput() ?>

    <?= $form->field($model, 'to_amount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>