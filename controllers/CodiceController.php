<?php

namespace app\controllers;

use app\models\Codice;
use app\models\CodiceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CodiceController implements the CRUD actions for Codice model.
 */
class CodiceController extends Controller
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
     * Lists all Codice models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CodiceSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Codice model.
     * @param string $codice Codice
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($codice)
    {
        return $this->render('view', [
            'model' => $this->findModel($codice),
        ]);
    }

    /**
     * Creates a new Codice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Codice();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'codice' => $model->codice]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Codice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $codice Codice
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($codice)
    {
        $model = $this->findModel($codice);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'codice' => $model->codice]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Codice model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $codice Codice
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($codice)
    {
        $this->findModel($codice)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Codice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $codice Codice
     * @return Codice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($codice)
    {
        if (($model = Codice::findOne(['codice' => $codice])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
