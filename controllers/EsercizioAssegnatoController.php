<?php

namespace app\controllers;

use app\models\EsercizioAssegnato;
use app\models\EsercizioAssegnatoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EsercizioAssegnatoController implements the CRUD actions for EsercizioAssegnato model.
 */
class EsercizioAssegnatoController extends Controller
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
     * Lists all EsercizioAssegnato models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EsercizioAssegnatoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EsercizioAssegnato model.
     * @param int $idTerapia Id Terapia
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
     * Creates a new EsercizioAssegnato model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new EsercizioAssegnato();

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
     * Updates an existing EsercizioAssegnato model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idTerapia Id Terapia
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
     * Deletes an existing EsercizioAssegnato model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idTerapia Id Terapia
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
     * Finds the EsercizioAssegnato model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idTerapia Id Terapia
     * @param int $idEsercizio Id Esercizio
     * @return EsercizioAssegnato the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idTerapia, $idEsercizio)
    {
        if (($model = EsercizioAssegnato::findOne(['idTerapia' => $idTerapia, 'idEsercizio' => $idEsercizio])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
