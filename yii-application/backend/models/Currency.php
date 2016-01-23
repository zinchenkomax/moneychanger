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
}