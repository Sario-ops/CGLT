<?php

use yii\db\Migration;

/**
 * Class m220615_193109_quesito
 */
class m220615_193109_quesito extends Migration
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


        $this->createTable('{{%quesito}}', [
            'id' => $this->primaryKey(),
            'esercizio_id' => $this->integer()->notNull(),
            'domanda' => $this->string(255)->notNull(),
            'opzioni_risposta' => $this->string(128),
            'risposta_corretta' => $this->string(24),
            'domanda_immagina' => $this->string(255),
        ], $tableOptions);

        $this->addForeignKey(
            'fk-quesito-esercizio_id',
            'quesito',
            'esercizio_id',
            'esercizio',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%quesito}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220615_193109_quesito cannot be reverted.\n";

        return false;
    }
    */
}
