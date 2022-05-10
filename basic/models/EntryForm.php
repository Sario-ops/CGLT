<?php

namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model {

    public $name;
    public $email;

    public function rules() { //insieme di regole per la convalida dei dati

        return  [
            [['name','email'], 'required'],//obbligatori
            ['email','email']//email deve essere sintatticamente corretto
        ];
    }
}
