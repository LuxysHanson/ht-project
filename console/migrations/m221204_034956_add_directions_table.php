<?php

use yii\db\Migration;

/**
 * Class m221204_034956_add_directions_table
 */
class m221204_034956_add_directions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("directions", [
            'id' => $this->primaryKey(),
            'city_id' => $this->integer()->notNull(),
            'country_id' => $this->integer()->notNull(),
            'price' => $this->integer(),
            'cur' => $this->string(25),
            'defaultDate' => $this->date(),
            'days' => 'int[]',
            'ts' => $this->timestamp()->notNull()->defaultValue(new \yii\db\Expression('NOW()'))
        ]);

        $this->addForeignKey('direction_city', 'directions', 'city_id', 'cities', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('direction_country', 'directions', 'country_id', 'countries', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221204_034956_add_directions_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221204_034956_add_directions_table cannot be reverted.\n";

        return false;
    }
    */
}
