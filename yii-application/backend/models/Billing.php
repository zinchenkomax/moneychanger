<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "billing".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Currency[] $currencies
 */
class Billing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'billing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер платежной системы',
            'name' => 'Название платежной системы',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrencies()
    {
        return $this->hasMany(Currency::className(), ['billing_id' => 'id']);
    }
}