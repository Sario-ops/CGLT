<?php

use yii\db\Migration;

/**
 * Class m220615_194847_notifications
 */
class m220615_194847_notifications extends Migration
{
    /**
     * Create table `notifications`
     */
    public function up()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        // notifications
        $this->createTable('{{%notifications}}', [
            'id' => $this->primaryKey(),
            'class' => $this->string(64)->notNull(),
            'key' => $this->string(32)->notNull(),
            'message' => $this->string(255)->notNull(),
            'route' => $this->string(255)->notNull(),
            'seen' => $this->boolean()->notNull()->defaultValue(false),
            'read' => $this->boolean()->notNull()->defaultValue(false),
            'user_id' => $this->string(30)->notNull()->defaultValue(''),
            'created_at' => $this->integer(11)->unsigned()->notNull()->defaultValue(0),
        ], $tableOptions);
        $this->createIndex('index_2', '{{%notifications}}', ['user_id']);
        $this->createIndex('index_3', '{{%notifications}}', ['created_at']);
        $this->createIndex('index_4', '{{%notifications}}', ['seen']);

    }

    /**
     * Drop table `notifications`
     */
    public function down()
    {
        $this->dropTable('{{%notifications}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220615_194847_notifications cannot be reverted.\n";

        return false;
    }
    */
}
