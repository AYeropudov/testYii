<?php

use yii\db\Migration;

/**
 * Class m171123_121325_fix_product_tbl
 */
class m171123_121325_fix_product_tbl extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->alterColumn('scrapper_products', 'created_at', $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171123_121325_fix_product_tbl cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171123_121325_fix_product_tbl cannot be reverted.\n";

        return false;
    }
    */
}
