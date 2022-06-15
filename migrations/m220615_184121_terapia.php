<?php

use yii\db\Migration;

/**
 * Class m220615_184121_terapia
 */
class m220615_184121_terapia extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;

        if ($this->db->driverName !== 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=mysql';
        }


        $this->createTable('{{%terapia}}', [
            'ID' => $this->char(5),
            'idUtente' => $this->string(30)->notNull(),
            'idLogopedista' => $this->string(30)->notNull(),
            'PRIMARY KEY(ID)',
        ], $tableOptions);

        $this->addForeignKey(
            'fk-terapia-idLogopedista',
            'terapia',
            'idLogopedista',
            'logopedista',
            'username',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-terapia-idUtente',
            'terapia',
            'idUtente',
            'utente',
            'username',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%terapia}}');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220615_184121_terapia cannot be reverted.\n";

        return false;
    }
    */
}
