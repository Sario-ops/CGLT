<?php

namespace app\notifications;

use Yii;
use webzop\notifications\Notification;

class AccountNotification extends Notification
{
    const KEY_NEW_ACCOUNT = 'new_account';

    const KEY_RESET_PASSWORD = 'reset_password';

    /**
     * @var \yii\web\User the user object
     */
    public $user;

    /**
     * @inheritdoc
     */
    public function getTitle(){
        switch($this->key){
            case self::KEY_NEW_ACCOUNT:
                return Yii::t('app', 'Nuovo esercizio da valutare {user}', ['user' => '#'.$this->user->id]);
            case self::KEY_RESET_PASSWORD:
                return Yii::t('app', 'Instructions to reset the password');
        }
    }

    /**
     * @inheritdoc
     */
    public function getRoute(){
        return ['/caregiver/esercizi_da_validare', 'id' => $this->user->id];
    }


}
