<?php

namespace app\controllers;

use app\models\LoginForm;
use yii\web\Controller;
use app\models\Logopedista;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\LogopedistaSearch;
use yii\web\NotFoundHttpException;

/**
 * LogopedistaController implements the CRUD actions for Logopedista model.
 */
class LogopedistaController extends Controller
{

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                'class' => AccessControl::className(),
                'only' => ['home'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
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
     * Lists all Logopedista models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new LoginForm();
        $searchModel = new LogopedistaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Logopedista model.
     * @param string $EMAIL Email
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($EMAIL)
    {
        return $this->render('view', [
            'model' => $this->findModel($EMAIL),
        ]);
    }

    /**
     * Creates a new Logopedista model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Logopedista();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'EMAIL' => $model->EMAIL]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Logopedista model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $EMAIL Email
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($EMAIL)
    {
        $model = $this->findModel($EMAIL);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'EMAIL' => $model->EMAIL]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Logopedista model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $EMAIL Email
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($EMAIL)
    {
        $this->findModel($EMAIL)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Logopedista model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $EMAIL Email
     * @return Logopedista the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($EMAIL)
    {
        if (($model = Logopedista::findOne(['EMAIL' => $EMAIL])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
