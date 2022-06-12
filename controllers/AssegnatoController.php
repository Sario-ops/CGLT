<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Assegnato;
use yii\filters\VerbFilter;
use app\models\DiagnosiSearch;
use app\models\AssegnatoSearch;
use yii\data\ArrayDataProvider;
use yii\web\NotFoundHttpException;

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
        /*
        $searchModel = new AssegnatoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]); */

        $model = $this->findModel(Yii::$app->logopedista->identity->username)->assegnato;
        $searchModel = new AssegnatoSearch();
        $dataProvider = new ArrayDataProvider([
            'key' => 'id',
            'allModels' => $model,
            'sort' => [
            'attributes' => ['id',
            'idTerapia','idEsercizio',
            'risposta','stato','valutazione'],
            ]
        ]);
       
        return $this->render('index', ['searchModel' => $searchModel, 'dataProvider'=> $dataProvider]);

    }

    /**
     * Displays a single Assegnato model.
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
     * Creates a new Assegnato model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Assegnato();

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
     * Updates an existing Assegnato model.
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
     * Deletes an existing Assegnato model.
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
     * Finds the Assegnato model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Assegnato the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Assegnato::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
