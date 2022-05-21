<?php

namespace app\controllers;

use app\models\Logopedista;
use app\models\LogopedistaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\LoginForm;

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
     * @param string $email Email
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($email)
    {
        return $this->render('view', [
            'model' => $this->findModel($email),
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
                return $this->redirect(['view', 'email' => $model->email]);
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
     * @param string $email Email
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($email)
    {
        $model = $this->findModel($email);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'email' => $model->email]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Logopedista model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $email Email
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($email)
    {
        $this->findModel($email)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Logopedista model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $email Email
     * @return Logopedista the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($email)
    {
        if (($model = Logopedista::findOne(['email' => $email])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
