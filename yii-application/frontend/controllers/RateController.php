<?php

namespace frontend\controllers;

use Yii;
use app\models\Currency;
use app\models\Rate;
use yii\helpers\ArrayHelper;
use app\models\Billing;

class RateController extends \yii\web\Controller
{
    public function actionGetRate()
    {
        return $this->render('get-rate');
    }

    public function actionGetCurrencies()
    {
        $billing_id = Yii::$app->request->post( 'billing_id' );

        $currencies = ArrayHelper::map( Currency::find()->where(
            "billing_id = :billing_id",
            [':billing_id' => $billing_id ]
        )->with('billing')->asArray()->all(), 'id', 'name')  ;

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return $currencies;
    }

    public function actionIndex()
    {
        $rate = new Rate();
        $currency = new Currency();

        $billing = ArrayHelper::map( Billing::find()->asArray()->all(), 'id', 'name');

        return $this->render('index', [
                'rate' => $rate,
                'billing' => $billing,
                'currency' => $currency,
            ]
        );
    }

}