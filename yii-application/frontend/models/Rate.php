<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rate".
 *
 * @property integer $id
 * @property integer $from_currency_id
 * @property integer $to_currency_id
 * @property double $from_amount
 * @property double $to_amount
 *
 * @property Currency $fromCurrency
 * @property Currency $toCurrency
 */
class Rate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from_currency_id', 'to_currency_id', 'from_amount', 'to_amount'], 'required'],
            [['from_currency_id', 'to_currency_id'], 'integer'],
            [['from_amount', 'to_amount'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер курса',
            'from_currency_id' => 'Номер базовой валюты',
            'to_currency_id' => 'Номер валюты конвертации',
            'from_amount' => 'Сумма в базовой валюте',
            'to_amount' => 'Сумма в валюте конвертации',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFromCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'from_currency_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getToCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'to_currency_id']);
    }
}