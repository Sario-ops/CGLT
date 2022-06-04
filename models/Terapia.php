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
            [['idLogopedista'], 'exist', 'skipOnError' => true, 'targetClass' => Logopedista::class, 'targetAttribute' => ['idLogopedista' => 'username']],
            [['idUtente'], 'exist', 'skipOnError' => true, 'targetClass' => Utente::class, 'targetAttribute' => ['idUtente' => 'username']],
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
        return $this->hasOne(Utente::class, ['username' => 'idUtente']);
    }

    public function setIdLogopedista()
    {
        return $this->hasOne(Logopedista::class, ['username' => 'idLogopedista']);
    }
}
