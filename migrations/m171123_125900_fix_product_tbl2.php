<?php

use yii\db\Migration;

/**
 * Class m171123_125900_fix_product_tbl2
 */
class m171123_125900_fix_product_tbl2 extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->dropColumn('scrapper_products', 'product_id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171123_125900_fix_product_tbl2 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171123_125900_fix_product_tbl2 cannot be reverted.\n";

        return false;
    }
    */
}
