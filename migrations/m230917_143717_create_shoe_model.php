<?php

use yii\db\Migration;

/**
 * Class m230917_143717_create_shoe_model
 */
class m230917_143717_create_shoe_model extends Migration
{
    const TABLE_NAME = '{{%shoe_model}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'model' => $this->string(50)->notNull(),
        ],);

        $this->insert(self::TABLE_NAME, [
            'model' => 'Клёвые',
        ]);
        $this->insert(self::TABLE_NAME, [
            'model' => 'Модные',
        ]);
        $this->insert(self::TABLE_NAME, [
            'model' => 'Странные',
        ]);
        $this->insert(self::TABLE_NAME, [
            'model' => 'Весёлые',
        ]);
        $this->insert(self::TABLE_NAME, [
            'model' => 'Понтовые',
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
        echo "m230917_143717_create_shoe_model cannot be reverted.\n";

        return false;
    }
    */
}
