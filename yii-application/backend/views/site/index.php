<?php

/* @var $this yii\web\View */

$this->title = 'Меняла';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Меняла</h1>
        <h2>Панель администратора</h2>

        <p class="lead">Сервис определения соотношения курсов валют различных платежых систем</p>

        <p><a class="btn btn-lg btn-success" href="/billing/create">Добавить платежную систему</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Платежные системы</h2>

                <p>Платёжные системы являются заменителем расчётов наличными деньгами при осуществлении
                    внутренних и международных платежей. Подразумевается, что через платёжные системы
                    осуществляется перевод денег.</p>

                <p><a class="btn btn-default" href="/billing">Доступные платежные системы &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Валюты</h2>

                <p>Валюта представляет собой денежную единицу — ключевой элемент денежной системы государства.
                    Каждая платежная система позволяет проводить операции с определённым набором доступных валют.</p>

                <p><a class="btn btn-default" href="/currency">Список валют &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Курсы валют</h2>

                <p>В каждой платежной системе может быть свой курс конвертации каждой валюты.</p>

                <p><a class="btn btn-default" href="/rate">Курсы валют &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
