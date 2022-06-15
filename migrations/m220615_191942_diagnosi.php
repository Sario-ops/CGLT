<?php

use yii\db\Migration;

/**
 * Class m220615_191942_diagnosi
 */
class m220615_191942_diagnosi extends Migration
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


        $this->createTable('{{%diagnosi}}', [
            'id' => $this->primaryKey(),
            'idUtente' => $this->string(30)->notNull(),
            'idLogopedista' => $this->string(30)->notNull(),
            'dataDiagnosi' => $this->date(),
            'descrizioneDiagnosi' => $this->string(16000),
        ], $tableOptions);

        $this->addForeignKey(
            'fk-diagnosi-idUtente',
            'diagnosi',
            'idUtente',
            'utente',
            'username',
        );

        $this->addForeignKey(
            'fk-diagnosi-idLogopedista',
            'diagnosi',
            'idLogopedista',
            'logopedista',
            'username',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%diagnosi}}');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220615_191942_diagnosi cannot be reverted.\n";

        return false;
    }
    */
}
