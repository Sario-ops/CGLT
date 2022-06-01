<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "esercizio_assegnato".
 *
 * @property int $idTerapia
 * @property int $idEsercizio
 * @property string|null $risposta
 *
 * @property Esercizio $idEsercizio0
 * @property Terapia $idTerapia0
 */
class EsercizioAssegnato extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'esercizio_assegnato';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idTerapia', 'idEsercizio'], 'required'],
            [['idEsercizio'], 'integer'],
            [['idTerapia'], 'string', 'max' => 5],
            [['risposta'], 'string', 'max' => 20],
            [['idTerapia', 'idEsercizio'], 'unique', 'targetAttribute' => ['idTerapia', 'idEsercizio']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idTerapia' => 'Id Terapia',
            'idEsercizio' => 'Id Esercizio',
            'risposta' => 'Risposta',
        ];
    }

    /**
     * Gets query for [[IdEsercizio0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdEsercizio0()
    {
        return $this->idEsercizio;
    }

    /**
     * Gets query for [[IdTerapia0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdTerapia0()
    {
        return $this->idTerapia;
    }
}
