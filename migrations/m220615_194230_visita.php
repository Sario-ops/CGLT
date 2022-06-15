<?php

use yii\db\Migration;

/**
 * Class m220615_194230_visita
 */
class m220615_194230_visita extends Migration
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

        $this->createTable('{{%visita}}', [
            'id' => $this->primaryKey(),
            'idUtente' => $this->string(30)->notNull(),
            'idLogopedista' => $this->string(30)->notNull(),
            'dataPrenotazione' => $this->date(),
            'dataVisita' => $this->date(),
            'oraVisita' => $this->time(),
            'stato' => $this->boolean()->notNull()->defaultValue(false),
        ], $tableOptions);

        $this->addForeignKey(
            'fk-visita-idLogopedista',
            'visita',
            'idLogopedista',
            'logopedista',
            'username',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-visita-idUtente',
            'visita',
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
        $this->dropTable('{{%visita}}');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220615_194230_visita cannot be reverted.\n";

        return false;
    }
    */
}
