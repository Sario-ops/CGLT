<?php

namespace app\controllers;

use yii;
use app\models\Utente;
use app\models\Terapia;
use app\models\TerapiaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Logopedista;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;

/**
 * TerapiaController implements the CRUD actions for Terapia model.
 */
class TerapiaController extends Controller
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
     * Lists all Terapia models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = $this->findModel(Yii::$app->logopedista->identity->username)->idLogopedista;
        $searchModel = new TerapiaSearch();
        $dataProvider = new ArrayDataProvider([
            'key' => 'ID',
            'allModels' => $model,
            'sort' => [
                'attributes' => [            
                'ID',
                'idUtente',
                'idLogopedista',
            ]
        ]
    ]);
       
        return $this->render('index', ['searchModel' => $searchModel, 'dataProvider'=> $dataProvider]);
    }

    /**
     * Displays a single Terapia model.
     * @param int $ID ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID),
        ]);
    }

    /**
     * Creates a new Terapia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Terapia();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ID' => $model->ID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Terapia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ID ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID)
    {
        $model = $this->findModel($ID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Terapia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ID ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ID)
    {
        $this->findModel($ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Terapia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID ID
     * @return Terapia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID)
    {
        if (($model = Terapia::findOne(['ID' => $ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /* public function actionAndamento()
    {
        $model = $this->findModel(Yii::$app->logopedista->identity->username)->terapias;
        $searchModel = new TerapiaSearch();
        $dataProvider = new ArrayDataProvider([
            'key' => 'ID',
            'allModels' => $model,
            'sort' => [
                'attributes' => [            
                'ID',
                'idUtente',
                'idLogopedista'],
            ]
        ]);

        return $this->render('andamento', ['searchModel' => $searchModel, 'dataProvider'=> $dataProvider]);

    } */

}