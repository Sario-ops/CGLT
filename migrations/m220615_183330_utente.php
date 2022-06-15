<?php

use yii\db\Migration;

/**
 * Class m220615_183330_utente
 */
class m220615_183330_utente extends Migration
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


        $this->createTable('{{%utente}}', [
            'username' => $this->string(20),
            'nome' => $this->string(15)->notNull(),
            'cognome' => $this->string(15)->notNull(),
            'cf' => $this->char(16)->notNull(),
            'password' => $this->string(255)->notNull(),
            'authkey' => $this->string(30),
            'idCaregiver' => $this->string(30)->notNull(),
            'idLogopedista' => $this->string(30)->notNull(),
            'PRIMARY KEY(username)',
        ], $tableOptions);

        $this->addForeignKey(
            'fk-utente-idLogopedista',
            'utente',
            'idLogopedista',
            'logopedista',
            'username',
        );

        $this->addForeignKey(
            'fk-utente-idCaregiver',
            'utente',
            'idCaregiver',
            'caregiver',
            'username',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%utente}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220615_183330_utente cannot be reverted.\n";

        return false;
    }
    */
}
