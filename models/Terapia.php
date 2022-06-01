<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "terapia".
 *
 * @property string|null $idUtente
 * @property string|null $idLogopedista
 * @property int $ID
 *
 * @property EsercizioAssegnato[] $esercizioAssegnatos
 * @property Esercizio[] $idEsercizios
 * @property Logopedista $idLogopedista0
 * @property Utente $idUtente0
 */
class Terapia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'terapia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID'], 'required'],
            [['ID'], 'string', 'max' => 5],
            [['idUtente', 'idLogopedista'], 'string', 'max' => 30],
            [['ID'], 'unique'],
            [['idLogopedista'], 'exist', 'skipOnError' => true, 'targetAttribute' => ['idLogopedista' => 'idLogopedista']],
            [['idUtente'], 'exist', 'skipOnError' => true, 'targetAttribute' => ['idUtente' => 'idUtente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idUtente' => 'Id Utente',
            'idLogopedista' => 'Id Logopedista',
            'ID' => 'ID',
        ];
    }

    /**
     * Gets query for [[IdLogopedista0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdLogopedista()
    {
        return $this->idLogopedista;
    }

    /**
     * Gets query for [[IdUtente0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUtente()
    {
        return $this->idUtente;
    }

    public function setIdLogopedista()
    {
         $this->idLogopedista='logopedista';
    }
}
