<?php

namespace app\controllers;

use app;
use app\models\LoginForm;
use yii;
use app\models\Visita;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\VisitaSearch;
use yii\web\NotFoundHttpException;

/**
 * VisitaController implements the CRUD actions for Visita model.
 */
class VisitaController extends Controller
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
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Visita models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new VisitaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $model = new Visita();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Visita model.
     * @param string $idUtente Id Utente
     * @param string $idLogopedista Id Logopedista
     * @param string $idCaregiver Id Caregiver
     * @param string $dataVisita Data Visita
     * @param string $oraVisita Ora Visita
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idUtente, $idLogopedista, $dataVisita, $oraVisita)
    {
        return $this->render('view', [
            'model' => $this->findModel($idUtente, $idLogopedista, $dataVisita, $oraVisita),
        ]);
    }

    /**
     * Creates a new Visita model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */

    /*public function actionCreate()
    {
        $model = new Visita();
        $model->setData(date("Y-m-d"));
        
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->save();
                return $this->redirect(['view', 'idUtente' => $model->idUtente, 'idLogopedista' => $model->idLogopedista, 'dataVisita' => $model->dataVisita, 'oraVisita' => $model->oraVisita]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }*/

    /**
     * Updates an existing Visita model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $idUtente Id Utente
     * @param string $idLogopedista Id Logopedista
     * @param string $idCaregiver Id Caregiver
     * @param string $dataVisita Data Visita
     * @param string $oraVisita Ora Visita
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idUtente, $idLogopedista, $dataVisita, $oraVisita)
    {
        $model = $this->findModel($idUtente, $idLogopedista, $dataVisita, $oraVisita);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idUtente' => $model->idUtente, 'idLogopedista' => $model->idLogopedista, 'dataVisita' => $model->dataVisita, 'oraVisita' => $model->oraVisita]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Visita model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $idUtente Id Utente
     * @param string $idLogopedista Id Logopedista
     * @param string $idCaregiver Id Caregiver
     * @param string $dataVisita Data Visita
     * @param string $oraVisita Ora Visita
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idUtente, $idLogopedista, $dataVisita, $oraVisita)
    {
        $this->findModel($idUtente, $idLogopedista, $dataVisita, $oraVisita)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Visita model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $idUtente Id Utente
     * @param string $idLogopedista Id Logopedista
     * @param string $idCaregiver Id Caregiver
     * @param string $dataVisita Data Visita
     * @param string $oraVisita Ora Visita
     * @return Visita the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idUtente, $idLogopedista, $dataVisita, $oraVisita)
    {
        if (($model = Visita::findOne(['idUtente' => $idUtente, 'idLogopedista' => $idLogopedista, 'dataVisita' => $dataVisita, 'oraVisita' => $oraVisita])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
