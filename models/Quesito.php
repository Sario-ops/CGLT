<?php

namespace app\models;

use Exception;
use Yii;

/**
 * This is the model class for table "Quesito".
 *
 * @property int $id
 * @property int|null $esercizio_id
 * @property string|null $domanda
 * @property string|null $opzioni_risposta
 * @property string|null $risposta_corretta
 * @property string|null $domanda_immagine
 *
 * @property Esercizio $esercizio
 */
class Quesito extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quesito';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['domanda'], 'required'],
            [['esercizio_id'], 'integer'],
            [['domanda', 'domanda_immagine'], 'string', 'max' => 255],
            [['opzioni_risposta'], 'string', 'max' => 128],
            [['risposta_corretta'], 'string', 'max' => 24],
            [['esercizio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Esercizio::className(), 'targetAttribute' => ['esercizio_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'esercizio_id' => 'Esercizio ID',
            'domanda' => 'Domanda',
            'opzioni_risposta' => 'Opzioni Risposta',
            'risposta_corretta' => 'Risposta Corretta',
            'domanda_immagine' => 'Domanda Immagine',
        ];
    }

    /**
     * Gets query for [[Esercizio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEsercizio()
    {
        return $this->hasOne(Esercizio::class, ['id' => 'esercizio_id']);
    }

    
    public function getArrayOptions()
    {
        return explode('&', $this->opzioni_risposta);
    }

    public function evaluateEsercizio($i)
    {
        try{
            if( $this->getArrayOptions()[$i] === $this->risposta_corretta ) {
                return 1;
            }

        } catch (Exception $e) {

            return 0;
        }

    }
}
