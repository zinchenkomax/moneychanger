<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Мои контакты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>



    <div class="row">
        <div class="col-xs-12">
            <p>Меня зовут Максим Зинченко</p>
            <p>Мой номер телефона: 067-124-72-47</p>
            <p>Буду рад получить от вас звонок</p>
        </div>
    </div>

</div>
