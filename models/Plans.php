<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plans".
 *
 * @property int $id
 * @property int $credit_id
 * @property int $pay_num
 * @property string $pay_date
 * @property int $pay_sum
 * @property int $perc_sum
 * @property int $body_sum
 * @property int $credit_balance
 */
class Plans extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['credit_id', 'pay_num', 'pay_date', 'pay_sum', 'perc_sum', 'body_sum', 'credit_balance'], 'required'],
            [['credit_id', 'pay_num', 'pay_sum', 'perc_sum', 'body_sum', 'credit_balance'], 'integer'],
            [['pay_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'credit_id' => 'Credit ID',
            'pay_num' => 'Pay Num',
            'pay_date' => 'Pay Date',
            'pay_sum' => 'Pay Sum',
            'perc_sum' => 'Perc Sum',
            'body_sum' => 'Body Sum',
            'credit_balance' => 'Credit Balance',
        ];
    }

    public function getFormattedDate()
    {
        return date('d.m.Y', strtotime($this->pay_date));
    }
}
