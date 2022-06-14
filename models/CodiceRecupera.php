<?php

namespace app\models;

class CodiceRecupera extends \yii\base\Model
{
    public $codice;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['codice'], 'required'],
            [['codice'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'codice' => 'Codice ricevuto'
        ];
    }
    

}
