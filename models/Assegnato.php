<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "assegnato".
 *
 * @property int $id
 * @property string|null $idTerapia
 * @property int|null $idEsercizio
 * @property string|null $risposta
 * @property string|null $stato
 * @property int|null $valutazione
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
            [['idEsercizio', 'valutazione'], 'integer'],
            [['stato'], 'string'],
            [['idTerapia'], 'string', 'max' => 5],
            [['risposta'], 'string', 'max' => 255],
            [['idTerapia'], 'exist', 'skipOnError' => true, 'targetClass' => Terapia::className(), 'targetAttribute' => ['idTerapia' => 'ID']],
            [['idEsercizio'], 'exist', 'skipOnError' => true, 'targetClass' => Esercizio::className(), 'targetAttribute' => ['idEsercizio' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idTerapia' => 'Id Terapia',
            'idEsercizio' => 'Id Esercizio',
            'risposta' => 'Risposta',
            'stato' => 'Stato',
            'valutazione' => 'Valutazione',
        ];
    }

    /**
     * Gets query for [[IdEsercizio0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdEsercizio0()
    {
        return $this->hasOne(Esercizio::className(), ['id' => 'idEsercizio']);
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

        /**
     * Gets query for [[Assegnatos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssegnatos()
    {
        return $this->hasMany(Assegnato::className(), ['idTerapia' => 'ID']);
    }
    
}
