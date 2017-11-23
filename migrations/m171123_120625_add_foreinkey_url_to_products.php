<?php

use yii\db\Migration;

/**
 * Class m171123_120625_add_foreinkey_url_to_products
 */
class m171123_120625_add_foreinkey_url_to_products extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-url_id',
            'scrapper_products',
            'url_id',
            'scrapper_products',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171123_120625_add_foreinkey_url_to_products cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171123_120625_add_foreinkey_url_to_products cannot be reverted.\n";

        return false;
    }
    */
}
