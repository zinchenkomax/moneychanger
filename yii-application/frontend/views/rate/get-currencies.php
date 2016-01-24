<?php

/* @var $rate app\models\Rate */
/* @var $currencies  */
use yii\helpers\Html;

?>

<?= Html::activeDropDownList( $rate, 'from_currency_id', $currencies ) ?>