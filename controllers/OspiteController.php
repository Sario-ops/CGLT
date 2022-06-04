<?php

namespace app\controllers;

use Yii;
use app\models\Esercizio;
use yii\web\NotFoundHttpException;

class OspiteController extends \yii\web\Controller
{
    public $index = 0;

    public function actionIndex()
    {
        $model = $this->findModel();


        if ($model->load(Yii::$app->request->get()) && $model->save() ) {
            $risultato = $model->evaluateEsercizio();   

            return $this->render('finishTest',['result' => $risultato, 'numeroDomande' => count($model->quesitos)]);
        }

        return $this->render('index', ['model' => $model, 'quesiti' => $model->quesitos]);
    }

    protected function findModel()
    {
        if (($model = Esercizio::findOne(['id' => 1])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
