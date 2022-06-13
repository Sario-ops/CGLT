<?php

namespace app\controllers;

use Yii;
use Exception;
use app\models\Codice;
use app\models\Utente;
use yii\web\Controller;
use app\models\Assegnato;
use app\models\Caregiver;
use app\models\Esercizio;
use app\models\LoginForm;
use app\models\Logopedista;
use yii\filters\VerbFilter;
use app\models\UtenteSearch;
use yii\filters\AccessControl;
use app\models\AssegnatoSearch;
use app\models\EsercizioSearch;
use yii\data\ArrayDataProvider;
use yii\web\NotFoundHttpException;
use app\notifications\AccountNotification;
/**
 * UtenteController implements the CRUD actions for Utente model.
 */
class UtenteController extends Controller
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
                    'user' => 'utente', // this user object defined in web.php
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['login','create','codice'],
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
     * Lists all Utente models.
     *
     * @return string
     */
    public function actionIndex()
    {
        // $searchModel = new UtenteSearch();
        // $dataProvider = $searchModel->search($this->request->queryParams);

        $model = $this->findModel(Yii::$app->utente->identity->username);

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->utente->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        $model->setCustomer("U");

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Utente model.
     * @param string $username Username
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
     * Creates a new Utente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($utente,$logopedista,$codice)
    {
        $model = new Utente();
        $model->setauthkey(Yii::$app->security->generateRandomString(10));
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Codice::findOne(['codice'=>$codice])->delete();
                return $this->redirect(['view', 'username' => $model->username]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'utente' => $utente,
            'logopedista' => $logopedista,
        ]);
    }

    /**
     * Updates an existing Utente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $username Username
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($username)
    {
        $model = $this->findModel($username);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Utente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $username Username
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($username)
    {
        $this->findModel($username)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Utente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $username Username
     * @return Utente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($username)
    {
        if (($model = Utente::findOne(['username' => $username])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionEsercizi() {

        $searchModel = new EsercizioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('esercizi', ['searchModel'=>$searchModel, 'dataProvider' => $dataProvider ]);
    }

    public function actionExecute($id) {

        $exercise = $this->findExercise($id);

        if ($exercise->load(Yii::$app->request->post())) {
            $exercise->setFeedback();
            $risultato = $exercise->evaluateEsercizio();
            $exercise->save();

            return $this->render('finishExercise',['result' => $risultato, 
            'numeroDomande' => count($exercise->quesitos), 'conCaregiver' => $exercise->conCaregiver]);

        }

        return $this->render('execute', ['esercizio' => $exercise, 'quesiti' => $exercise->quesitos]); 
    }


    public function actionPermission($id, $assegnato=false) {

        $utente = $this->findModel(Yii::$app->utente->identity->username);
        $caregiver = $utente->idCaregiver0;

        if ($caregiver->load($this->request->post())) {

            if ($caregiver->validatePassword($caregiver->assistenzaPassword)) {

                if($assegnato) {
                    return $this->redirect(['eseguiassegnato', 'idAssegnato' => $id, 'assistenza' => true]);
                }

                return $this->redirect(['execute', 'id' => $id]);
            } else {
                Yii::$app->session->setFlash('error', "Password non valida");
            }

        }

        return $this->render('permission', ['caregiver' => $caregiver]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->utente->logout();

        return $this->redirect(['site/index']);
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
     * Finds the Assegnato model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Assegnato the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findAssegnato($id)
    {
        if (($model = Assegnato::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionTerapia() {

        $utente = $this->findModel(Yii::$app->utente->identity->username);

        $dataProvider = new ArrayDataProvider([
            'key'=>'idEsercizio',
            'allModels' => $utente->getEserciziTerapia('da eseguire'),
            'sort' => [
                'attributes' => ['id','idTerapia', 'idEsercizio', 'stato', 'valutazione', 'risposta'],
            ],
        ]);

        return $this->render('terapia', ['dataProvider' => $dataProvider]);
    }


    public function actionEseguiassegnato($idAssegnato, $assistenza=false) {

        $assegnato = $this->findAssegnato($idAssegnato);
        $exercise = $this->findExercise($assegnato->idEsercizio);
        $caregiver = Caregiver::findOne(['username' => $this->findModel(Yii::$app->utente->identity->username)->idCaregiver]);

        if($exercise->conCaregiver && $assistenza === false) {
            $this->redirect(['permission', 'id' => $assegnato->id, 'assegnato' => true]);
        }

        if ($exercise->load(Yii::$app->request->post()) && $exercise->save() ) {
            $risultato = $exercise->evaluateEsercizio();

            $utente = $this->findModel(Yii::$app->utente->identity->username);

            $assegnato->valutazione = $risultato;
            $assegnato->stato = 'validato';
            $assegnato->risposta = $exercise->getRisposteString();
            AccountNotification::create(AccountNotification::ESERCIZIO_ESEGUITO, ['user' => $assegnato])->send(((Logopedista::findOne(['username'=>$utente->idLogopedista]))->username));


            $assegnato->save();

            return $this->render('finishExercise',['result' => $risultato, 
            'numeroDomande' => count($exercise->quesitos), 'conCaregiver' => false]);

        } else if (Yii::$app->request->isPost && $exercise->conCaregiver) {

            $assegnato->stato = 'in validazione';
            $assegnato->save();
            AccountNotification::create(AccountNotification::ESERCIZIO_DA_VALUTARE, ['user' => $assegnato])->send($caregiver->username);
            return $this->render('finishExercise',['result' => 0, 
            'numeroDomande' => count($exercise->quesitos), 'conCaregiver' => true]);
        }

        return $this->render('execute', ['esercizio' => $exercise, 'quesiti' => $exercise->quesitos]);
    }


    public function actionCodice() 
    {
        $model = new \app\models\Codice();
        try{
            if ($model->load(Yii::$app->request->post())) {
                $codice = Codice::findOne(['codice'=>$model->codice]);
            return $this->redirect(['create', 'utente'=>$codice->utente, 'logopedista'=>$codice->logopedista,'codice'=>$model->codice]);
            }
        }catch(Exception $e){
            Yii::$app->session->setFlash('error', "Codice non valido");
        }
        return $this->render('codice', [
            'model' => $model,
        ]);
        
    }
/*
public function actionDelete($codice)
{
    $this->findModel($codice)->delete();

    return $this->redirect(['index']);
}*/
}