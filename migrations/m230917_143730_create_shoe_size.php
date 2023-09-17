<?php

use yii\db\Migration;

/**
 * Class m230917_143730_create_shoe_size
 */
class m230917_143730_create_shoe_size extends Migration
{
    const TABLE_NAME = '{{%shoe_size}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'size' => $this->integer(),
        ],);

        $this->insert(self::TABLE_NAME, [
            'size' => 40,
        ]);
        $this->insert(self::TABLE_NAME, [
            'size' => 41,
        ]);
        $this->insert(self::TABLE_NAME, [
            'size' => 42,
        ]);
        $this->insert(self::TABLE_NAME, [
            'size' => 43,
        ]);
        $this->insert(self::TABLE_NAME, [
            'size' => 44,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230917_143730_create_shoe_size cannot be reverted.\n";

        return false;
    }
    */
}
