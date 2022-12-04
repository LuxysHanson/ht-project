<?php

use yii\db\Migration;

/**
 * Class m221203_090229_add_cities_table
 */
class m221203_090229_add_cities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("cities", [
            'id' => $this->primaryKey(),
            'name' => $this->string(2000)->notNull(),
            'nameFrom' => $this->string(2000)->notNull(),
            'sort' => $this->integer(),
            'ts' => $this->timestamp()->notNull()->defaultValue(new \yii\db\Expression('NOW()'))
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221203_090229_add_cities_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221203_090229_add_cities_table cannot be reverted.\n";

        return false;
    }
    */
}
