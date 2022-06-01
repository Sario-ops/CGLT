<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "visita".
 *
 * @property string $idUtente
 * @property string $idLogopedista
 * @property string $idCaregiver
 * @property string|null $nomeUtente
 * @property string|null $cognomeUtente
 * @property string|null $dataPrenotazione
 * @property string $dataVisita
 * @property string $oraVisita
 *
 * @property Caregiver $idCaregiver0
 * @property Logopedista $idLogopedista0
 * @property Utente $idUtente0
 */
class Visita extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'visita';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUtente', 'idLogopedista', 'idCaregiver', 'dataVisita', 'oraVisita'], 'required'],
            [['dataPrenotazione', 'dataVisita', 'oraVisita'], 'safe'],
            [['idUtente'], 'string', 'max' => 20],
            [['idLogopedista', 'idCaregiver'], 'string', 'max' => 30],
            [['nomeUtente', 'cognomeUtente'], 'string', 'max' => 15],
            [['idUtente', 'idLogopedista', 'idCaregiver', 'dataVisita', 'oraVisita'], 'unique', 'targetAttribute' => ['idUtente', 'idLogopedista', 'idCaregiver', 'dataVisita', 'oraVisita']],
            [['idLogopedista'], 'exist', 'skipOnError' => true, 'targetClass' => Logopedista::className(), 'targetAttribute' => ['idLogopedista' => 'username']],
            [['idUtente'], 'exist', 'skipOnError' => true, 'targetClass' => Utente::className(), 'targetAttribute' => ['idUtente' => 'username']],
            [['idCaregiver'], 'exist', 'skipOnError' => true, 'targetClass' => Caregiver::className(), 'targetAttribute' => ['idCaregiver' => 'username']],
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
            'idCaregiver' => 'Id Caregiver',
            'nomeUtente' => 'Nome Utente',
            'cognomeUtente' => 'Cognome Utente',
            'dataPrenotazione' => 'Data Prenotazione',
            'dataVisita' => 'Data Visita',
            'oraVisita' => 'Ora Visita',
        ];
    }

    /**
     * Gets query for [[IdCaregiver0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCaregiver0()
    {
        return $this->hasOne(Caregiver::className(), ['username' => 'idCaregiver']);
    }

    /**
     * Gets query for [[IdLogopedista0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdLogopedista0()
    {
        return $this->hasOne(Logopedista::className(), ['username' => 'idLogopedista']);
    }

    /**
     * Gets query for [[IdUtente0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUtente0()
    {
        return $this->hasOne(Utente::className(), ['username' => 'idUtente']);
    }
}
