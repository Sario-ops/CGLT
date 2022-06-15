<?php

use yii\db\Migration;

/**
 * Class m220615_172712_logopedista
 */
class m220615_172712_logopedista extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220615_172712_logopedista cannot be reverted.\n";

        return false;
    }

    //Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'InnoDB') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=mysql';
        }


        $this->createTable('{{%logopedista}}', [
            'username' => $this->string(30),
            'nome' => $this->string(15)->notNull(),
            'cognome' => $this->string(15)->notNull(),
            'cf' => $this->string(16)->notNull(),
            'password' => $this->string(255)->notNull(),
            'authkey' => $this->string(30),
            'PRIMARY KEY(username)',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%logopedista}}');

        return true;
    }
}
