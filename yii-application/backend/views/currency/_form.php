<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Currency */
/* @var $form yii\widgets\ActiveForm */
/* @var $billing array */
?>

<div class="currency-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'billing_id' )->dropDownList(
        $billing,
        [ ['id' => 'name'],  'prompt'=>'Выберите платежную систему' ]
    )->label('Название платежной системы'); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>