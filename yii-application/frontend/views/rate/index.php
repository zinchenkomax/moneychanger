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
<div class="container">
    <div class="row">
        <div class="col-xs-8">
            <div class="row">
                <div class="col-xs-5">
                    <!-- from_billing -->
                    <?= $form->field( $currency, 'billing_id', [
                            'inputOptions' => ['class' => 'form-control','id' => 'from_billing']
                        ]
                    )->dropDownList( $billing, [
                            ['id' => 'base-billing'],
                            'prompt'=>'Выберите базовую платежную систему',
                        ]
                    )->label('Базовая платежная система'); ?>
                </div>
                <div class="col-xs-5 col-xs-offset-1">
                    <!-- from_currency -->
                    <?= $form->field( $rate, 'from_currency_id' , [
                            'inputOptions' => [ 'class' => 'form-control','id' => 'from_currency' ]
                        ]
                    )->dropDownList( [], [
                            'size' => 10,
                            'onchange'=>'getRate(this)',
                        ]
                    )->label( 'Доступные валюты' ) ?>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-5">
                    <!-- to_billing -->
                    <?= $form->field( $currency, 'billing_id', [
                            'inputOptions' => ['class' => 'form-control','id' => 'to_billing']
                        ]
                    )->dropDownList( $billing, [
                            ['id' => 'base-billing'],
                            'prompt'=>'Выберите платежную систему конвертации',
                        ]
                    )->label('Платежная система конвертации'); ?>
                </div>
                <div class="col-xs-5 col-xs-offset-1">
                    <!-- to_currency -->
                    <?= $form->field( $rate, 'to_currency_id', [
                            'inputOptions' => [ 'class' => 'form-control','id' => 'to_currency' ]
                        ]
                    )->dropDownList( [], [
                            'size' => 10,
                            'onchange'=>'getRate(this)',
                        ]
                    )->label( 'Доступные валюты' ) ?>
                </div>
            </div>
        </div>

        <div class="col-xs-4 text-center">
            <?= Html::tag('h2', 'Курс') ?>
            <?= Html::tag('p', 'Выберите пару валют', [ 'id' => 'result-response' ]) ?>
            <?= Html::tag('p', '', [ 'id' => 'result-rate', 'style' => 'font-size: 100px' ]) ?>
        </div>
    </div>
</div>

<?php ActiveForm::end() ?>

