<?php

use yii\db\Migration;

/**
 * Class m221203_090924_add_countries_table
 */
class m221203_090924_add_countries_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("countries", [
            'id' => $this->primaryKey(),
            'name' => $this->string(2000)->notNull(),
            'nameTo' => $this->string(2000)->notNull(),
            'to' => $this->string(1000)->notNull(),
            'sort' => $this->integer(),
            'departs' => 'int[]',
            'ts' => $this->timestamp()->notNull()->defaultValue(new \yii\db\Expression('NOW()'))
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221203_090924_add_countries_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221203_090924_add_countries_table cannot be reverted.\n";

        return false;
    }
    */
}
