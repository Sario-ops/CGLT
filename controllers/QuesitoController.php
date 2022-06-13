<?php

namespace app\controllers;

use app\models\Quesito;
use yii\web\Controller;
use app\models\Esercizio;
use yii\filters\VerbFilter;
use app\models\QuesitoSearch;
use yii\data\ArrayDataProvider;
use yii\web\NotFoundHttpException;

/**
 * QuesitoController implements the CRUD actions for Quesito model.
 */
class QuesitoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Quesito models.
     *
     * @return string
     */
    public function actionIndex($idEsercizio)
    {
        $esercizio = Esercizio::findOne(['id' => $idEsercizio]);
        $dataProvider = new ArrayDataProvider([
            'key'=>'id',
            'allModels' => $esercizio->quesitos,
            'sort' => [
                'attributes' => ['id', 'domanda','opzioni_risposta', 'esercizio_id', 'risposta_corretta', 'domanda_immagine'],
            ],
        ]);

        return $this->render('index', [
            'idEsercizio' => $idEsercizio,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Quesito model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Quesito model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Quesito();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Quesito model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Quesito model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Quesito model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Quesito the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Quesito::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
