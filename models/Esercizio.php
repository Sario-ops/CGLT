<?php

namespace app\models;

use Yii;

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
            [['conCaregiver'], 'integer'],
            [['nome'], 'string', 'max' => 32],
            [['descrizione', 'categoria'], 'string', 'max' => 255],
            [['risposte'], 'each', 'rule' => ['integer']],
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
        $voto = 0;

        foreach ($this->quesitos as $i => $quesito) {
            $voto += $quesito->evaluateEsercizio($this->risposte[$i]); 
        }

        return $voto;
    }


    public function getRisposteString() {
        $result = '';

        foreach ($this->quesitos as $i => $quesito) {
            $result = sprintf("%s%s",$result, $quesito->getArrayOptions()[$this->risposte[$i]].'&');
        }

        $result = rtrim($result, "& ");
        return $result;

    }
}
