<?php

use yii\db\Migration;

/**
 * Class m230917_143738_create_shoe_color
 */
class m230917_143738_create_shoe_color extends Migration
{
    const TABLE_NAME = '{{%shoe_color}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'color' => $this->string(50),
        ],);

        $this->insert(self::TABLE_NAME, [
            'color' => 'красные',
        ]);
        $this->insert(self::TABLE_NAME, [
            'color' => 'чёрные',
        ]);
        $this->insert(self::TABLE_NAME, [
            'color' => 'зелёные',
        ]);
        $this->insert(self::TABLE_NAME, [
            'color' => 'синие',
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
        echo "m230917_143738_create_shoe_color cannot be reverted.\n";

        return false;
    }
    */
}
