<?php

namespace app\notifications;

use Yii;
use webzop\notifications\Notification;

class AccountNotification extends Notification
{
    const ESERCIZIO_DA_VALUTARE = 'esercizio_da_valutare';

    const ESERCIZIO_ESEGUITO = 'esrcizio_eseguito';

    const CONFERMA_VISITA = 'conferma_visita';

    /**
     * @var \yii\web\User the user object
     */
    public $user;

    /**
     * @inheritdoc
     */
    public function getTitle(){
        switch($this->key){
            case self::ESERCIZIO_DA_VALUTARE:
                return Yii::t('app', 'Nuovo esercizio da valutare {user}', ['user' => '#'.$this->user->id]);
            case self::ESERCIZIO_ESEGUITO:
                return Yii::t('app', 'Esercizio terapia #{user} eseguito', ['user' => $this->user->idTerapia]);
            case self::CONFERMA_VISITA:
                return Yii::t('app', 'Richiesta visita {visita}', ['visita' => '#'.$this->user->id]);
        }
    }

    /**
     * @inheritdoc
     */
    public function getRoute(){
        switch($this->key){
            case self::ESERCIZIO_DA_VALUTARE:
                return ['/caregiver/esercizi_da_validare', 'id' => $this->user->id];
            case self::ESERCIZIO_ESEGUITO:
                return ['/caregiver/esercizi_da_validare', 'id' => $this->user->id];
        }   
    }
}
