<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "currency".
 *
 * @property integer $id
 * @property integer $billing_id
 * @property string $name
 *
 * @property Billing $billing
 * @property Rate[] $rates
 * @property Rate[] $rates0
 */
class Currency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'currency';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['billing_id', 'name'], 'required'],
            [['billing_id'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер валюты',
            'billing_id' => 'Номер платежной системы',
            'name' => 'Название валюты',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBilling()
    {
        return $this->hasOne(Billing::className(), ['id' => 'billing_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRates()
    {
        return $this->hasMany(Rate::className(), ['to_currency_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRates0()
    {
        return $this->hasMany(Rate::className(), ['from_currency_id' => 'id']);
    }


    /**
     * Список связей
     * @return array
     */
    public function relations()
    {
        return [
            'billing'=> [ 'BELONGS_TO', 'billing', 'billing_id' ],
        ];
    }


    /**
     * Получить список валют в виде массива,
     * array(
     *  номер валюты => название платежной системы + название валюты
     *
     * @return array
     */
    static function getCurrencyList(){
        $currency_list = [];
        foreach ( self::find()->with('billing')->asArray()->all() as $currency_record ) {

            $currency_list[ $currency_record['id'] ] = sprintf( "%s - %s",
                $currency_record['billing']['name'],
                $currency_record['name']
            );
        }

        return $currency_list;
    }


    /**
     * Получить название валюты составленное из названия платежной системы и названия валюты
     * @return string
     */
    function getName(){
        return sprintf( '%s - %s', $this->billing->name, $this->name );
    }
}