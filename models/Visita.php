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
            [['stato'], 'integer'],
            [['idUtente'], 'string', 'max' => 20],
            [['idLogopedista'], 'string', 'max' => 30],
            [['idLogopedista'], 'exist', 'skipOnError' => true, 'targetClass' => Logopedista::className(), 'targetAttribute' => ['idLogopedista' => 'username']],
            [['idUtente'], 'exist', 'skipOnError' => true, 'targetClass' => Utente::className(), 'targetAttribute' => ['idUtente' => 'username']],
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
            'dataPrenotazione' => 'Data Prenotazione',
            'dataVisita' => 'Data Visita',
            'oraVisita' => 'Ora Visita',
            'stato' => 'Stato',
        ];
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

    public function setData($data)
    {
        $this->dataPrenotazione=$data;
    }

    public function setStato($stato)
    {
        $this->stato=$stato;
    }
}
