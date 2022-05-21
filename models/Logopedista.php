<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "logopedisti".
 *
 * @property string|null $nome
 * @property string|null $cognome
 * @property string|null $cf
 * @property string $email
 * @property string|null $password
 *
 * @property Utenti[] $utentis
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
            [['email'], 'required'],
            [['nome', 'cognome'], 'string', 'max' => 15],
            [['cf'], 'string', 'max' => 16],
            [['email', 'password'], 'string', 'max' => 30],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nome' => 'Nome',
            'cognome' => 'Cognome',
            'cf' => 'Cf',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

    /**
     * Gets query for [[Utentis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUtentis()
    {
        return $this->hasMany(Utenti::className(), ['idLogopedista' => 'email']);
    }
}
