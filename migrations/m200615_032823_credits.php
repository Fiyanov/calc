<?php

use yii\db\Migration;

/**
 * Class m200615_032823_credits
 */
class m200615_032823_credits extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('credits', [
            'id' => $this->primaryKey(),
            'date_start' => $this->timestamp(),
            'date_end' => $this->timestamp(),
            'amount' => $this->integer(),
            'months_count' => $this->integer(),
            'percent' => $this->decimal(10, 2),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('credits');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200615_032823_credits cannot be reverted.\n";

        return false;
    }
    */
}
