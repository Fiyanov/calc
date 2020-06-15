<?php

use yii\db\Migration;

/**
 * Class m200615_032835_plans
 */
class m200615_032835_plans extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('plans', [
            'id' => $this->primaryKey(),
            'credit_id' => $this->integer(),
            'pay_num' => $this->integer(),
            'pay_date' => $this->date(),
            'pay_sum' => $this->integer(),
            'perc_sum' => $this->integer(),
            'body_sum' => $this->integer(),
            'credit_balance' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('plans');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200615_032835_plans cannot be reverted.\n";

        return false;
    }
    */
}
