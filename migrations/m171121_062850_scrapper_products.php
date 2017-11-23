<?php

use yii\db\Migration;

/**
 * Class m171121_062850_scrapper_products
 */
class m171121_062850_scrapper_products extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('scrapper_products', [
            'id' => $this->primaryKey(),
            'product_id' => $this->string(30)->notNull()->unique(),
            'created_at' => $this->integer(11)
        ]);
        $this->createIndex('products_ids','scrapper_products', ['product_id'], true);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropIndex('products_ids', 'scrapper_products');
        $this->dropTable('scrapper_products');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171121_062850_scrapper_products cannot be reverted.\n";

        return false;
    }
    */
}
