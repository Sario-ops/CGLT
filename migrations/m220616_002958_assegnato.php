<?php

use yii\db\Migration;

/**
 * Class m220615_184646_assegnato
 */
class m220615_184646_assegnato extends Migration
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

        $this->createTable('{{%assegnato}}', [
            'id' => $this->primaryKey(),
            'idTerapia' => $this->char(5)->notNull(),
            'idEsercizio' => $this->integer()->notNull(),
            'risposta' => $this->string(255),
            'stato' => $this->string()->notNull()->defaultValue('da eseguire'),
            'valutazione' => $this->integer(),
        ], $tableOptions);

        $this->addForeignKey(
            'fk-assegnato-idTerapia',
            'assegnato',
            'idTerapia',
            'terapia',
            'ID',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-assegnato-idEsercizio',
            'assegnato',
            'idEsercizio',
            'esercizio',
            'id',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%assegnato}}');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220615_184646_assegnato cannot be reverted.\n";

        return false;
    }
    */
}
