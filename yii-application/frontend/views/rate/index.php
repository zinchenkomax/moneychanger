<?php
/* @var $this yii\web\View */
/* @var $rate app\models\Rate */
/* @var $currency app\models\Currency */
/* @var $billing array */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h1>Узнать курс</h1>

<?php
$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>

<!-- from_billing --!>
    <?= $form->field( $currency, 'billing_id', [
            'inputOptions' => ['class' => 'form-control','id' => 'from_billing']
        ]
    )->dropDownList( $billing, [
            ['id' => 'base-billing'],
            'prompt'=>'Выберите базовую платежную систему',
        ]
    )->label('Название базовой платежной системы'); ?>

<!-- from_currency --!>
    <?= $form->field( $rate, 'from_currency_id' , [
            'inputOptions' => [ 'class' => 'form-control','id' => 'from_currency' ]
        ]
    )->dropDownList( [], [
            'prompt'=>'Выберите базовую валюту',
            'size' => 10,
        ]
    ) ?>

<!-- to_billing --!>
    <?= $form->field( $currency, 'billing_id', [
            'inputOptions' => ['class' => 'form-control','id' => 'to_billing']
    ]
    )->dropDownList( $billing, [
            ['id' => 'base-billing'],
            'prompt'=>'Выберите платежную систему конвертации',
        ]
    )->label('Название платежной системы конвертации'); ?>

<!-- to_currency --!>
    <?= $form->field( $rate, 'to_currency_id', [
            'inputOptions' => [ 'class' => 'form-control','id' => 'to_currency' ]
        ]
    )->dropDownList( [], [
            'prompt'=>'Выберите валюту конвертации',
            'size' => 10,
        ]
    ) ?>


<?php ActiveForm::end() ?>

