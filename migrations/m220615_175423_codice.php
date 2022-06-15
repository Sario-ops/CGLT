<?php

use yii\db\Migration;

/**
 * Class m220615_175423_codice
 */
class m220615_175423_codice extends Migration
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
        echo "m220615_175423_codice cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'InnoDB') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=Mysql';
        }


        $this->createTable('{{%codice}}', [
            'codice' => $this->char(8),
            'logopedista' => $this->string(30)->notNull(),
            'utente' => $this->string(15)->notNull(),
            'PRIMARY KEY(codice)',
        ], $tableOptions);
        $this->addForeignKey(
            'fk-codice-logopedista',
            'codice',
            'logopedista',
            'logopedista',
            'username',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('{{%codice}}');

        return true;
    }
}
