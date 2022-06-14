<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;

/**
 * This is the model class for table "utente".
 *
 * @property string|null $nome
 * @property string|null $cognome
 * @property string|null $cf
 * @property string $username
 * @property string|null $dataNascita
 * @property string|null $password
 * @property string|null $authkey
 * @property string|null $idCaregiver
 * @property string|null $idLogopedista
 *
 * @property Diagnosi[] $diagnosis
 * @property Caregiver $idCaregiver0
 * @property Logopedista $idLogopedista0
 * @property Terapia[] $terapias
 */
class Utente extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'utente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'idCaregiver'], 'required'],
            [['dataNascita'], 'safe'],
            [['nome', 'cognome'], 'string', 'max' => 15],
            [['cf'], 'string', 'max' => 16],
            [['username'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 255],
            [['authkey', 'idCaregiver', 'idLogopedista'], 'string', 'max' => 30],
            [['username'], 'unique'],
            [['idCaregiver'], 'exist', 'skipOnError' => true, 'targetClass' => Caregiver::className(), 'targetAttribute' => ['idCaregiver' => 'username']],
            [['idLogopedista'], 'exist', 'skipOnError' => true, 'targetClass' => Logopedista::className(), 'targetAttribute' => ['idLogopedista' => 'username']],
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
            'username' => 'Username',
            'dataNascita' => 'Data Nascita',
            'password' => 'Password',
            'authkey' => 'Authkey',
            'idCaregiver' => 'Email Caregiver',
            'idLogopedista' => 'Email Logopedista',
        ];
    }

    /**
     * Gets query for [[Diagnosis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiagnosis()
    {
        return $this->hasMany(Diagnosi::className(), ['idUtente' => 'username']);
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
     * Gets query for [[Terapias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTerapias()
    {
        return $this->hasMany(Terapia::className(), ['idUtente' => 'username']);
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
    
    public function validateAuthKey($authKey) {
        return $this->authkey === $authKey;
    }
    
    
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
    
    public function setAuthKey($authkey)
    {
        $this->authkey=$authkey;
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

    public function getEserciziTerapia($stato) {

        $terapie = $this->terapias;
        $esercizi_assegnati = [];

        foreach ($terapie as $terapia) {

            foreach ($terapia->assegnatos as $assegnato) {

                if( $assegnato->stato === $stato ) {
                    array_push($esercizi_assegnati, $assegnato);
                }
            }

        }

        return $esercizi_assegnati;
    }

}

