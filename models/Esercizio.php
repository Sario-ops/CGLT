<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "esercizio".
 *
 * @property string|null $nome
 * @property string|null $descrizione
 * @property int $ID
 * @property float|null $feedback
 * @property string|null $risposte
 * @property string|null $risposte_corretta
 */
class Esercizio extends \yii\db\ActiveRecord
{

    public $lastResponse;
    public $risposteDate = [];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'esercizio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['feedback'], 'number'],
            [['nome', 'risposte_corretta', 'lastResponse'], 'string', 'max' => 20],
            [['descrizione'], 'string', 'max' => 300],
            [['risposte'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nome' => 'Nome',
            'descrizione' => 'Descrizione',
            'ID' => 'ID',
            'feedback' => 'Feedback',
            'risposte' => 'Risposte',
            'risposte_corretta' => 'Risposte Corretta',
        ];
    }


    public function getArrayQuestion() {
        return explode('&',$this->descrizione);
    }

    public function getArrayResponse() {
        return explode('&',$this->risposte);
    }

    public function addResponse($risposta) {
        array_push($this->risposteDate, $risposta);
    }

}
