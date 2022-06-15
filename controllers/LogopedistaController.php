<?php

namespace app\controllers;

use app\models\CodiceRecupera;
use Yii;
use Exception;
use app\models\Visita;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\Logopedista;
use yii\filters\VerbFilter;
use app\models\UtenteSearch;
use app\models\VisitaSearch;
use app\models\TerapiaSearch;
use app\models\DiagnosiSearch;
use yii\filters\AccessControl;
use yii\data\ArrayDataProvider;
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
        return [
            'access' => [
                'class' => AccessControl::className(),
                'user' => 'logopedista', // this user object defined in web.php
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['login', 'create', 'recupera', 'cambiopassword'],
                        'roles' => ['?'],

                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Logopedista models.
     *
     * @return string
     */
    public function actionIndex()
    {
        // $searchModel = new LogopedistaSearch();
        // $dataProvider = $searchModel->search($this->request->queryParams);
        $model = $this->findModel(Yii::$app->logopedista->identity->username);

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->logopedista->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        $model->setCustomer("L");

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }


    /**
     * Displays a single Logopedista model.
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
     * Creates a new Logopedista model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Logopedista();
        $model->setauthkey(Yii::$app->security->generateRandomString(10));
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
     * Updates an existing Logopedista model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $username Username
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
     * Deletes an existing Logopedista model.
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
     * Finds the Logopedista model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $username Username
     * @return Logopedista the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($username)
    {
        if (($model = Logopedista::findOne(['username' => $username])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionVisualizza() {

        $model = $this->findModel(Yii::$app->logopedista->identity->username)->utentes;
        $searchModel = new UtenteSearch();
        $dataProvider = new ArrayDataProvider([
            'key' => 'id',
            'allModels' => $model,
            'sort' => [
                'attributes' => ['nome',
                'cognome',
                'cf',
                'username',
                'dataNascita',
                'idCaregiver',
                'idLogopedista'],
            ]
        ]);
       
        return $this->render('visualizza', ['searchModel' => $searchModel, 'dataProvider'=> $dataProvider]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->logopedista->logout();

        return $this->redirect(['site/index']);
    }  

    public function actionCreatevisita()
    {
        try
        {
        $model = new Visita();
        $model->setData(date("Y-m-d"));
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $this->findModel(Yii::$app->logopedista->identity->username)->checkUtente($model->idUtente);
                $model->stato=1;
                $model->save();
                return $this->redirect(['..\visita/view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }
        }
        catch(Exception $e)
        {
            if($e->getMessage() != 'Utente non trovato')
              Yii::$app->session->setFlash('error', "Data o ora non validi");
              else{
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('..\visita/create', [
            'model' => $model,
            'username' => Yii::$app->logopedista->identity->username,
        ]);
    }
 
    public function actionVisita()
    {
        $confermate=[];
        $visite = $this->findModel(Yii::$app->logopedista->identity->username)->visitas;
        foreach($visite as $visita){
            if($visita->stato==1){
                array_push($confermate,$visita);
            }
        }
        $searchModel = new VisitaSearch();
        $dataProvider = new ArrayDataProvider([
            'key' => 'id',
            'allModels' => $confermate,
            'sort' => [
                'attributes' => [            
                'id',
                'idUtente',
                'idLogopedista',
                'idCaregiver',
                'nomeUtente',
                'cognomeUtente',
                'dataPrenotazione',
                'dataVisita',
                'oraVisita'],
            ]
        ]);

        return $this->render('/visita\index', ['searchModel' => $searchModel, 'dataProvider'=> $dataProvider]);
    }

    public function actionDiagnosi()
    {
        $model = $this->findModel(Yii::$app->logopedista->identity->username)->diagnosis;
        $searchModel = new DiagnosiSearch();
        $dataProvider = new ArrayDataProvider([
            'key' => 'id',
            'allModels' => $model,
            'sort' => [
                'attributes' => [            
                'id',
                'idUtente',
                'idLogopedista',
                'idCaregiver',
                'dataDiagnosi',
                ],
            ]
        ]);

        return $this->render('/diagnosi\index', ['searchModel' => $searchModel, 'dataProvider'=> $dataProvider ]);
    }

    public function actionTerapia()
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

        return $this->render('/terapia\index', ['searchModel' => $searchModel, 'dataProvider'=> $dataProvider]);

    }

    public function actionConfermavisita($id)
    {
        $visita=Visita::findOne(['id'=>$id]);
        $visita->stato=1;
        $visita->save();
        return $this->redirect('visita');
    }

    public function actionRecupera() {

        $logopedista = new Logopedista();
        if($logopedista->load(Yii::$app->request->post())) {

            try{
                $logopedista = $this->findModel(['username' => $logopedista->username]);
                Yii::$app->mailer->compose()
                ->setTo($logopedista->username)
                ->setFrom('clgtpronuntia@gmail.com')
                ->setSubject('Password Dimenticata')
                ->setTextBody("Questo è il tuo codice $logopedista->password")
                ->send();
                return $this->redirect(['cambiopassword', 'email' => $logopedista->username]);

            } catch(Exception $e) {
                Yii::$app->session->setFlash('error', "Impossibile inviare il codice di cambio password");
            }
        }
        return $this->render('../site/recoverpassword', ['model' => $logopedista]);
    }

    public function actionCambiopassword($email) {

        $logopedista = $this->findModel(['username' =>$email]);
        $oldPassword = $logopedista->password;
        $codice = new CodiceRecupera();

        try {
            if($logopedista->load(Yii::$app->request->post()) && $codice->load(Yii::$app->request->post())) {
    
                if( $codice->codice == $oldPassword ) {
                    $logopedista->save();
                    return $this->redirect(['index']);
                } else {
                    Yii::$app->session->setFlash('error', "Codice non valido");
                }
            }

        } catch (Exception $e) {
            Yii::$app->session->setFlash('error', "Impossibile cambiare password");
        }


        return $this->render('../site/cambiapassword', ['model' => $logopedista, 'codice' => $codice ]);
    }
}
