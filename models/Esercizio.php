<?php

namespace app\models;

use Yii;
use Exception;
use yii\db\Query;

/**
 * This is the model class for table "Esercizio".
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $descrizione
 * @property int|null $conCaregiver
 *
 * @property Quesito[] $Quesitoes
 */
class Esercizio extends \yii\db\ActiveRecord
{

    public $risposte;
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
            [['nome','descrizione','categoria'], 'required'],
            [['conCaregiver','votazioni'], 'integer'],
            [['rating'], 'number'],
            [['nome'], 'string', 'max' => 32],
            [['descrizione', 'categoria'], 'string', 'max' => 255],
            [['risposte'], 'each', 'rule' => ['integer']],
            [['idLogopedista'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'descrizione' => 'Descrizione',
            'categoria' => 'Categoria',
            'conCaregiver' => 'Assistenza Caregiver',
            'rating' => 'Rating',
            'votazioni' => 'Votazioni',
            'idLogopedista' => 'Logopedista creatore',
        ];
    }

    /**
     * Gets query for [[Assegnatos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssegnatos()
    {
        return $this->hasMany(Assegnato::className(), ['idEsercizio' => 'id']);
    }

    /**
     * Gets query for [[Quesitos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuesitos()
    {
        return $this->hasMany(Quesito::className(), ['esercizio_id' => 'id']);
    }


    public function evaluateEsercizio()
    {
        try {
            $voto = 0;
    
            foreach ($this->quesitos as $i => $quesito) {
                $voto += $quesito->evaluateEsercizio($this->risposte[$i]); 
            }
    
            return $voto;
            
        } catch (Exception $e) {
            return 0;
        }
    }

    public function valutazioneCaregiver() {

        $valutazione = 0;

        foreach ($this->risposte as $risposta) {
            switch($risposta) {
                case 0:
                    $valutazione +=1;
                break;
                case 1:
                    $valutazione += 0.5;
                break;
                case 2:
                default:
            }
        }

        return $valutazione;
    }


    public function getRisposteString() {
        $result = '';

        foreach ($this->quesitos as $i => $quesito) {
            $result = sprintf("%s%s",$result, $quesito->getArrayOptions()[$this->risposte[$i]].'&');
        }

        $result = rtrim($result, "& ");
        return $result;

    }

    public function setFeedback() {
        
        try {

            $current_date = Esercizio::findOne(['id' => $this->id]);

            if($this->rating == 0) {
                $this->rating = $current_date->rating;
                return;
            }

            $this->rating = ($current_date->rating * $this->votazioni + $this->rating) / ($this->votazioni + 1);
            $this->votazioni+=1;

        } catch (Exception $e) {
            echo "<div>$e</div>";
        }
    }
}
