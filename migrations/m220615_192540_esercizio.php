<?php

use yii\db\Migration;

/**
 * Class m220615_192540_esercizio
 */
class m220615_192540_esercizio extends Migration
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


        $this->createTable('{{%esercizio}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(32)->notNull(),
            'descrizione' => $this->string(255)->notNull(),
            'categoria' => $this->string(255),
            'conCaregiver' => $this->boolean()->notNull()->defaultValue(false),
            'rating' => $this->float()->notNull()->defaultValue(0),
            'votazioni' => $this->integer()->notNull()->defaultValue(0),
            'idLogopedista' => $this->string(30),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%esercizio}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220615_192540_esercizio cannot be reverted.\n";

        return false;
    }
    */
}
