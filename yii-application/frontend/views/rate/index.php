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
    <?= $form->field( $currency, 'billing_id' )->dropDownList(
        $billing,
        [
            ['id' => 'base-billing'],
            'prompt'=>'Выберите платежную систему',
        ]
    )->label('Название базовой платежной системы'); ?>

    <?= $form->field( $rate, 'from_currency_id' )->dropDownList(
        [],
        [
//            ['id' => 'base_currency'],
            'prompt'=>'Выберите базовую валюту',
            'size' => 10,
        ]
    ) ?>


<?php ActiveForm::end() ?>

