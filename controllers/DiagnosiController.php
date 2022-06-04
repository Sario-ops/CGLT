<?php

namespace app\controllers;

use yii;
use app\models\Logopedista;
use app\models\Diagnosi;
use app\models\DiagnosiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DiagnosiController implements the CRUD actions for Diagnosi model.
 */
class DiagnosiController extends Controller
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
     * Lists all Diagnosi models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DiagnosiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $model = new Logopedista();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=> $model,
        ]);
    }

    /* 
    $searchModel = new DiagnosiSearch();
    $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    */

    /**
     * Displays a single Diagnosi model.
     * @param string $idUtente Id Utente
     * @param string $idLogopedista Id Logopedista
     * @param string $idCaregiver Id Caregiver
     * @param string $dataDiagnosi Data Diagnosi
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idUtente, $idLogopedista, $idCaregiver, $dataDiagnosi)
    {
        return $this->render('view', [
            'model' => $this->findModel($idUtente, $idLogopedista, $idCaregiver, $dataDiagnosi),
        ]);
    }

    /**
     * Creates a new Diagnosi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Diagnosi();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idUtente' => $model->idUtente, 'idLogopedista' => $model->idLogopedista, 'idCaregiver' => $model->idCaregiver, 'dataDiagnosi' => $model->dataDiagnosi]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Diagnosi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $idUtente Id Utente
     * @param string $idLogopedista Id Logopedista
     * @param string $idCaregiver Id Caregiver
     * @param string $dataDiagnosi Data Diagnosi
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idUtente, $idLogopedista, $idCaregiver, $dataDiagnosi)
    {
        $model = $this->findModel($idUtente, $idLogopedista, $idCaregiver, $dataDiagnosi);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idUtente' => $model->idUtente, 'idLogopedista' => $model->idLogopedista, 'idCaregiver' => $model->idCaregiver, 'dataDiagnosi' => $model->dataDiagnosi]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Diagnosi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $idUtente Id Utente
     * @param string $idLogopedista Id Logopedista
     * @param string $idCaregiver Id Caregiver
     * @param string $dataDiagnosi Data Diagnosi
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idUtente, $idLogopedista, $idCaregiver, $dataDiagnosi)
    {
        $this->findModel($idUtente, $idLogopedista, $idCaregiver, $dataDiagnosi)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Diagnosi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $idUtente Id Utente
     * @param string $idLogopedista Id Logopedista
     * @param string $idCaregiver Id Caregiver
     * @param string $dataDiagnosi Data Diagnosi
     * @return Diagnosi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idUtente, $idLogopedista, $idCaregiver, $dataDiagnosi)
    {
        if (($model = Diagnosi::findOne(['idUtente' => $idUtente, 'idLogopedista' => $idLogopedista, 'idCaregiver' => $idCaregiver, 'dataDiagnosi' => $dataDiagnosi])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
