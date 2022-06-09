<?php

namespace app\controllers;

use Yii;
use Exception;
use yii\base\Model;
use yii\web\Response;
use app\models\Quesito;
use yii\web\Controller;
use app\models\Esercizio;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\EsercizioSearch;
use yii\web\NotFoundHttpException;

/**
 * EsercizioController implements the CRUD actions for Esercizio model.
 */
class EsercizioController extends Controller
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
     * Lists all Esercizio models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EsercizioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Esercizio model.
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
     * Creates a new Esercizio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelEsercizio = new Esercizio;
        $modelsQuesito = [new Quesito];
        if ($modelEsercizio->load(Yii::$app->request->post())) {

            $modelsQuesito = Model::createMultiple(Quesito::class);
            Model::loadMultiple($modelsQuesito, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsQuesito),
                    ActiveForm::validate($modelEsercizio)
                );
            }

            // validate all models
            $valid = $modelEsercizio->validate();
            $valid = Model::validateMultiple($modelsQuesito) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelEsercizio->save(false)) {
                        foreach ($modelsQuesito as $i => $modelQuesito) {

                            $modelQuesito->save();
                            $image = UploadedFile::getInstance($modelQuesito, "[{$i}]domanda_immagine");
                            $modelQuesito->esercizio_id = $modelEsercizio->id;

                            if(!empty($image)) {
                                $esercizioId = $modelQuesito->id;
                                $imgName = 'ese_'. $esercizioId. '.'. $image->getExtension();
    
                                if (!is_dir(Yii::$app->basePath . '\web\image\esercizi/' . $modelQuesito->esercizio_id)) {
    
                                    mkdir(Yii::$app->basePath . '\web\image\esercizi/' . $modelQuesito->esercizio_id);
                            
                                }
                            
    
                                $image->saveAs(Yii::$app->basePath.'\web\image\esercizi/'.$modelQuesito->esercizio_id.'/'.$imgName);
                                $modelQuesito->domanda_immagine = $imgName;

                            }

                            if (! ($flag = $modelQuesito->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelEsercizio->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'modelEsercizio' => $modelEsercizio,
            'modelsQuesito' => (empty($modelsQuesito)) ? [new Quesito] : $modelsQuesito
        ]);
    }

    /**
     * Updates an existing Esercizio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $modelEsercizio = $this->findModel($id);
        $modelsQuesito = $modelEsercizio->quesitos;

        if ($modelEsercizio->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsQuesito, 'id', 'id');
            $modelsQuesito = Model::createMultiple(Quesito::classname(), $modelsQuesito);
            Model::loadMultiple($modelsQuesito, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsQuesito, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsQuesito),
                    ActiveForm::validate($modelEsercizio)
                );
            }

            // validate all models
            $valid = $modelEsercizio->validate();
            $valid = Model::validateMultiple($modelsQuesito) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelEsercizio->save(false)) {
                        if (! empty($deletedIDs)) {
                            Quesito::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsQuesito as $i => $modelQuesito) {

                            $image = UploadedFile::getInstance($modelQuesito, "[{$i}]domanda_immagine");
                            $modelQuesito->esercizio_id = $modelEsercizio->id;

                            if(!empty($image)) {
                                $esercizioId = $modelQuesito->id;
                                $imgName = 'ese_'. $esercizioId. '.'. $image->getExtension();
    
                                if (!is_dir(Yii::$app->basePath . '\web\image\esercizi/' . $modelQuesito->esercizio_id)) {
    
                                    mkdir(Yii::$app->basePath . '\web\image\esercizi/' . $modelQuesito->esercizio_id);
                            
                                }
                            
    
                                $image->saveAs(Yii::$app->basePath.'\web\image\esercizi/'.$modelQuesito->esercizio_id.'/'.$imgName);
                                $modelQuesito->domanda_immagine = $imgName;

                            }

                            if (! ($flag = $modelQuesito->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelEsercizio->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'modelEsercizio' => $modelEsercizio,
            'modelsQuesito' => (empty($modelsQuesito)) ? [new Quesito] : $modelsQuesito
        ]);
    }

    /**
     * Deletes an existing Esercizio model.
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
     * Finds the Esercizio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Esercizio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Esercizio::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
