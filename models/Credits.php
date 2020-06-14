<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "credits".
 *
 * @property int $id
 * @property string $date_start
 * @property string|null $date_end
 * @property int $amount
 * @property int $months_count
 * @property float $percent
 */
class Credits extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'credits';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_start', 'date_end'], 'safe'],
            [['amount', 'months_count', 'percent'], 'required'],
            [['amount', 'months_count'], 'integer'],
            [['percent'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
            'amount' => 'Amount',
            'months_count' => 'Months Count',
            'percent' => 'Percent',
        ];
    }
}
