<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Logopedista;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;
    private $customer;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            switch ($this->customer) {
                case 'L':
                    return Yii::$app->logopedista->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 1);
                case 'C':
                    return Yii::$app->caregiver->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 1);
                case 'U':
                    return Yii::$app->utente->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 1); 
            }
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            switch ($this->customer) {
                case "L":
                    $this->_user = Logopedista::findByUsername($this->username);
                    break;
                case "C":
                    $this->_user = Caregiver::findByUsername($this->username);
                    break;
                case "U":
                    $this->_user = Utente::findByUsername($this->username);
                    break;
                default:
            }
        }
        return $this->_user;
    }

    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }
}
