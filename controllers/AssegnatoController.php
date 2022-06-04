<?php

namespace app\controllers;

use app\models\Assegnato;
use app\models\AssegnatoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AssegnatoController implements the CRUD actions for Assegnato model.
 */
class AssegnatoController extends Controller
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
     * Lists all Assegnato models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AssegnatoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Assegnato model.
     * @param string $idTerapia Id Terapia
     * @param int $idEsercizio Id Esercizio
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idTerapia, $idEsercizio)
    {
        return $this->render('view', [
            'model' => $this->findModel($idTerapia, $idEsercizio),
        ]);
    }

    /**
     * Creates a new Assegnato model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Assegnato();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idTerapia' => $model->idTerapia, 'idEsercizio' => $model->idEsercizio]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Assegnato model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $idTerapia Id Terapia
     * @param int $idEsercizio Id Esercizio
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idTerapia, $idEsercizio)
    {
        $model = $this->findModel($idTerapia, $idEsercizio);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idTerapia' => $model->idTerapia, 'idEsercizio' => $model->idEsercizio]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Assegnato model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $idTerapia Id Terapia
     * @param int $idEsercizio Id Esercizio
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idTerapia, $idEsercizio)
    {
        $this->findModel($idTerapia, $idEsercizio)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Assegnato model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $idTerapia Id Terapia
     * @param int $idEsercizio Id Esercizio
     * @return Assegnato the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idTerapia, $idEsercizio)
    {
        if (($model = Assegnato::findOne(['idTerapia' => $idTerapia, 'idEsercizio' => $idEsercizio])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
