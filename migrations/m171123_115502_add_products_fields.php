<?php

use yii\db\Migration;

/**
 * Class m171123_115502_add_products_fields
 */
class m171123_115502_add_products_fields extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('scrapper_products', 'title', $this->string(500)->null());
        $this->addColumn('scrapper_products', 'sku', $this->string(500)->null());
        $this->addColumn('scrapper_products', 'price', $this->float(2)->null());
        $this->addColumn('scrapper_products', 'url_id', $this->integer());

        $this->createIndex(
            'idx-sku-product',
            'scrapper_products',
            'sku'
        );

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171123_115502_add_products_fields cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171123_115502_add_products_fields cannot be reverted.\n";

        return false;
    }
    */
}
