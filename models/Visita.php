<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "visita".
 *
 * @property int $id
 * @property string|null $idUtente
 * @property string|null $idLogopedista
 * @property string|null $idCaregiver
 * @property string|null $nomeUtente
 * @property string|null $cognomeUtente
 * @property string|null $dataPrenotazione
 * @property string|null $dataVisita
 * @property string|null $oraVisita
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
            [['dataPrenotazione', 'dataVisita', 'oraVisita'], 'safe'],
            [['idUtente'], 'string', 'max' => 20],
            [['idLogopedista', 'idCaregiver'], 'string', 'max' => 30],
            [['nomeUtente', 'cognomeUtente'], 'string', 'max' => 15],
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
            'id' => 'ID',
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
