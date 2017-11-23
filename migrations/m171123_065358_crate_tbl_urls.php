<?php

use yii\db\Migration;

/**
 * Class m171123_065358_crate_tbl_urls
 */
class m171123_065358_crate_tbl_urls extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('scrapping_urls',[
            'id' => $this->primaryKey(),
            'url' => $this->string(500)->notNull()->unique(),
            'created_at'=> $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('scrapping_urls');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171123_065358_crate_tbl_urls cannot be reverted.\n";

        return false;
    }
    */
}
