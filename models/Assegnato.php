<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "assegnato".
 *
 * @property string $idTerapia
 * @property int $idEsercizio
 * @property string|null $risposta
 *
 * @property Esercizio $idEsercizio0
 * @property Terapia $idTerapia0
 */
class Assegnato extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assegnato';
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
            [['idTerapia'], 'exist', 'skipOnError' => true, 'targetClass' => Terapia::className(), 'targetAttribute' => ['idTerapia' => 'ID']],
            [['idEsercizio'], 'exist', 'skipOnError' => true, 'targetClass' => Esercizio::className(), 'targetAttribute' => ['idEsercizio' => 'ID']],
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
        return $this->hasOne(Esercizio::className(), ['ID' => 'idEsercizio']);
    }

    /**
     * Gets query for [[IdTerapia0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdTerapia0()
    {
        return $this->hasOne(Terapia::className(), ['ID' => 'idTerapia']);
    }
}
