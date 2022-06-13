<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;

/**
 * This is the model class for table "logopedista".
 *
 * @property string|null $nome
 * @property string|null $cognome
 * @property string|null $cf
 * @property string $username
 * @property string|null $password
 *
 * @property Utente[] $utentes
 */
class Logopedista extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logopedista';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['nome', 'cognome'], 'string', 'max' => 15],
            [['cf'], 'string', 'max' => 16],
            [['username', 'password','authkey'], 'string', 'max' => 30],
            [['username', 'authkey'], 'unique'],
            ['username', 'email'],
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
            'cf' => 'Codice fiscale',
            'username' => 'Email',
            'password' => 'Password',
            'authkey' => 'Authkey,'
        ];
    }

    /**
     * Gets query for [[Utentes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUtentes()
    {
        return $this->hasMany(Utente::class, ['idLogopedista' => 'username']);
    }

    public static function findIdentity($id) {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException();
    }

    public function getId() {
        return $this->username;
    }

    public function getAuthKey()
    {
        return $this->authkey;
    }
    
    public function setAuthKey($authkey)
    {
        $this->authkey=$authkey;
    }

    public function validateAuthKey($authKey) {
        return $this->authkey === $authKey;
    }


    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }


    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
