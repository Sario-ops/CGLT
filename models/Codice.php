<?php

namespace app\models;

use Yii;
use Exception;

/**
 * This is the model class for table "codice".
 *
 * @property string $codice
 * @property string|null $logopedista
 * @property string|null $utente
 */
class Codice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'codice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codice'], 'required'],
            [['codice'], 'string', 'max' => 8],
            [['logopedista', 'utente'], 'string', 'max' => 30],
            [['codice'], 'unique'],
            [['utente'], 'unique', 'skipOnError' => true, 'targetClass' => Utente::class, 'targetAttribute' => ['utente' => 'username']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'codice' => 'Codice',
            'logopedista' => 'Logopedista',
            'utente' => 'Utente',
        ];
    }
}