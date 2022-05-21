<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "logopedisti".
 *
 * @property int $code
 * @property string $name
 * @property string $surname
 * @property float $giorno_nascita
 * @property float $mese_di_nascita
 * @property float $anno_di_nascita
 * @property string $Codice_catastale_comune
 * @property string $CODICE_FISCALE
 * @property string $EMAIL
 * @property string $PASSWORD
 */
class Logopedista extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logopedisti';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'giorno_nascita', 'mese_di_nascita', 'anno_di_nascita', 'Codice_catastale_comune', 'CODICE_FISCALE', 'EMAIL', 'PASSWORD'], 'required'],
            [['giorno_nascita', 'mese_di_nascita', 'anno_di_nascita'], 'number'],
            [['name', 'surname', 'PASSWORD'], 'string', 'max' => 50],
            [['Codice_catastale_comune'], 'string', 'max' => 5],
            [['CODICE_FISCALE'], 'string', 'max' => 16],
            [['EMAIL'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'name' => 'Name',
            'surname' => 'Surname',
            'giorno_nascita' => 'Giorno Nascita',
            'mese_di_nascita' => 'Mese Di Nascita',
            'anno_di_nascita' => 'Anno Di Nascita',
            'Codice_catastale_comune' => 'Codice Catastale Comune',
            'CODICE_FISCALE' => 'Codice Fiscale',
            'EMAIL' => 'Email',
            'PASSWORD' => 'Password',
        ];
    }
}
