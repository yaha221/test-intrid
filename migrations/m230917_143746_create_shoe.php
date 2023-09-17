<?php

use yii\db\Migration;

/**
 * Class m230917_143746_create_shoe
 */
class m230917_143746_create_shoe extends Migration
{
    const TABLE_NAME = '{{%shoe}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'id_model' => $this->integer()->notNull(),
            'id_size' => $this->integer(),
            'id_color' => $this->integer(),
            'price' => $this->integer(),
            'count' => $this->integer(),
            'vendor_code' => $this->string(50)->unique(),
        ],);

        $this->insert(self::TABLE_NAME, [
            'id_model' => 1,
            'id_size' => 1,
            'id_color' => 1,
            'price' => 3000,
            'count' => 5,
            'vendor_code' => '14-144-40',
        ]);

        $this->insert(self::TABLE_NAME, [
            'id_model' => 2,
            'id_size' => 5,
            'id_color' => 3,
            'price' => 3500,
            'count' => 3,
            'vendor_code' => '17-233-44',
        ]);
        $this->insert(self::TABLE_NAME, [
            'id_model' => 3,
            'id_size' => 4,
            'id_color' => 1,
            'price' => 2000,
            'count' => 1,
            'vendor_code' => '16-934-43',
        ]);
        $this->insert(self::TABLE_NAME, [
            'id_model' => 3,
            'id_size' => 4,
            'id_color' => 4,
            'price' => 3000,
            'count' => 1,
            'vendor_code' => '16-933-43',
        ]);
        $this->insert(self::TABLE_NAME, [
            'id_model' => 4,
            'id_size' => 2,
            'id_color' => 3,
            'price' => 1000,
            'count' => 7,
            'vendor_code' => '12-744-41',
        ]);
        $this->insert(self::TABLE_NAME, [
            'id_model' => 5,
            'id_size' => 2,
            'id_color' => 2,
            'price' => 1500,
            'count' => 2,
            'vendor_code' => '15-322-41',
        ]);
        $this->insert(self::TABLE_NAME, [
            'id_model' => 5,
            'id_size' => 3,
            'id_color' => 2,
            'price' => 1500,
            'count' => 2,
            'vendor_code' => '15-322-42',
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
}
