<?php

use yii\db\Migration;

/**
 * Class m171121_064450_scrapper_products_index_fix
 */
class m171121_064450_scrapper_products_index_fix extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->dropIndex('products_ids', 'scrapper_products');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->createIndex('products_ids','scrapper_products', ['product_id'], true);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171121_064450_scrapper_products_index_fix cannot be reverted.\n";

        return false;
    }
    */
}
