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
        $from_currency_id = Yii::$app->request->post( 'from_currency_id' );
        $to_currency_id = Yii::$app->request->post( 'to_currency_id' );

        if( $from_currency_id !== null and $to_currency_id !== null ){
            $rate = Rate::find()
                ->where("from_currency_id = :from_currency_id", [ ':from_currency_id' => $from_currency_id ] )
                ->andWhere("to_currency_id = :to_currency_id", [ ':to_currency_id' => $to_currency_id ] )
                ->asArray()
                ->one();

            if( (bool)$rate ){
                $result = 'success';
            }else{
                $result = 'Для выбранной пары валют нет возможности конвертации';
            }
        }else{
            $result = [
                'result' => 'Методу не передан обязательный набор параметров'
            ];
            $rate = '';
        }

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return [
            'rate' => $rate,
            'result' => $result,
            'from_currency_id' => $from_currency_id,
            'to_currency_id' => $to_currency_id,
        ];
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