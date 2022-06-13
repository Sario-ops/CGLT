<?php

namespace app\controllers;

use Yii;
use app\models\Utente;
use app\models\Terapia;
use yii\web\Controller;
use app\models\Assegnato;
use app\models\Caregiver;
use app\models\Esercizio;
use app\models\LoginForm;
use yii\filters\VerbFilter;
use app\models\TerapiaSearch;
use yii\filters\AccessControl;
use app\models\CaregiverSearch;
use yii\data\ArrayDataProvider;
use yii\web\NotFoundHttpException;
use Exception;

/**
 * CaregiverController implements the CRUD actions for Caregiver model.
 */
class CaregiverController extends Controller
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
                    'user' => 'caregiver', // this user object defined in web.php
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['login','create'],
                            'roles' => ['?'],
    
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
     * Lists all Caregiver models.
     *
     * @return string
     */
    public function actionIndex()
    {
        // $searchModel = new CaregiverSearch();
        // $dataProvider = $searchModel->search($this->request->queryParams);
        $model = $this->findModel(Yii::$app->caregiver->identity->username);

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->caregiver->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        $model->setCustomer("C");

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Caregiver model.
     * @param string $username
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($username)
    {
        return $this->render('view', [
            'model' => $this->findModel($username),
        ]);
    }

    /**
     * Creates a new Caregiver model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Caregiver();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Caregiver model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $username
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($username)
    {
        $model = $this->findModel($username);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'username' => $model->username]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Caregiver model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $username
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($username)
    {
        $this->findModel($username)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Caregiver model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $username
     * @return Caregiver the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($username)
    {
        if (($model = Caregiver::findOne(['username' => $username])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the Utente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $username
     * @return Utente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findUtente($username)
    {
        if (($model = Utente::findOne(['username' => $username])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the Assegnato model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $username
     * @return Assegnato the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findEsercizioAssegnato($id)
    {
        if (($model = Assegnato::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    /**
     * Finds the Assegnato model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $username
     * @return Assegnato the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findTerapia($id)
    {
        if (($model = Terapia::findOne(['ID' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the Esercizio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Esercizio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findExercise($id)
    {
        if (($model = Esercizio::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->caregiver->logout();

        return $this->redirect(['site/index']);
    }


    public function actionEsercizi_da_validare() {

        $caregiver = $this->findModel(Yii::$app->caregiver->identity->username);
        $esercizi_da_validare = [];

        foreach( $caregiver->utentis as $utente) {
            
            if($utente->getEserciziTerapia('in validazione')) {
                array_push($esercizi_da_validare, ...$utente->getEserciziTerapia('in validazione'));
            }
        }

        $dataProvider = new ArrayDataProvider([
            'key' => 'idTerapia',
            'allModels' => $esercizi_da_validare,
            'sort' => [
                'attributes' => ['id','idTerapia', 'idEsercizio', 'stato', 'valutazione', 'risposta'],
            ],
        ]);

        return $this->render('esercizi_da_validare', ['dataProvider' => $dataProvider]);
    }

    public function actionValida($idEsercizio) {

        try{
            $esercizio_assegnato = $this->findEsercizioAssegnato($idEsercizio);
            $terapia = $this->findTerapia($esercizio_assegnato->idTerapia);
            $esercizio = $this->findExercise($esercizio_assegnato->idEsercizio);
            $utente = $this->findUtente($terapia->idUtente);
    
            if ($esercizio->load(Yii::$app->request->post()) && $esercizio->save() ) {
                $risultato = $esercizio->valutazioneCaregiver();
    
                $esercizio_assegnato->valutazione = $risultato;
                $esercizio_assegnato->stato = 'validato';
    
                $esercizio_assegnato->save();
    
                Yii::$app->session->setFlash('success', "Validazione esercizio avvenuta con successo");
    
                return $this->goBack();
    
            }
    
            return $this->render('esercizio', ['utente'=>$utente, 'esercizio' => $esercizio]);
            
        } catch(Exception $e) {
            Yii::$app->session->setFlash('error', "Validazione non riuscita");
            return $this->goBack();
        } 

    }

    public function actionTerapia()
    {
        $utenti = $this->findModel(Yii::$app->caregiver->identity->username)->utentis;
        $terapie = [];
        foreach ($utenti as $utente) {
            foreach ($utente->terapias as $terapia) {
                array_push($terapie,$terapia);
            }
        }
        $searchModel = new TerapiaSearch();
        $dataProvider = new ArrayDataProvider([
            'key' => 'ID',
            'allModels' => $terapie,
            'sort' => [
                'attributes' => [            
                'ID',
                'idUtente',
                'idLogopedista'],
            ]
        ]);

        return $this->render('/terapia\index', ['searchModel' => $searchModel, 'dataProvider'=> $dataProvider]);

    }
    
}