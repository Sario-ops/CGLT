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

        $domande = $model->getArrayQuestion();

        $risposte = $model -> getArrayResponse();

            if ($model->load(Yii::$app->request->get()) && $model->save() ) {
                $risultato = $model->evaluateEsercizio();

                return $this->render('finishTest',['result' => $risultato, 'numeroDomande' => count($domande)]);
            }

        return $this->render('index', ['model' => $model, 'domande' => $domande, 'risposte' => $risposte]);
    }

    protected function findModel()
    {
        if (($model = Esercizio::findOne(['ID' => 1])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
