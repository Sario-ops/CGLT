<?php

namespace app\controllers;

use app\models\Esercizio;
use yii\web\NotFoundHttpException;

class OspiteController extends \yii\web\Controller
{
    public $index = -1;

    public function actionIndex()
    {
        $model = $this->findModel();

        $domande = $model->getArrayQuestion();


        return $this->render('index', ['model' => $model, 'question' => $domande[$this->index]]);


    }

    protected function findModel()
    {
        if (($model = Esercizio::findOne(['ID' => 1])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
