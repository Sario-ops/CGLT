<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Visita;
use yii\grid\ActionColumn;

$request = Yii::$app->request;
$username = $request->get('username');

/* @var $this yii\web\View */
/* @var $searchModel app\models\VisitaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Creazione Visita';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnosi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Visita', ['/visita\create', 'model' => $model, 'username' => $username], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'idUtente',
            'idLogopedista',
            'idCaregiver',
            'nomeUtente',
            'cognomeUtente',
            'dataPrenotazione',
            'dataVisita',
            'oraVisita',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Visita $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idUtente' => $model->idUtente, 
                    'idLogopedista' => $model->idLogopedista, 
                    'idCaregiver' => $model->idCaregiver, 
                    'nomeUtente' => $model->nomeUtente,
                    'cognomeUtente' => $model->cognomeUtente,
                    'dataPrenotazione' => $model->dataPrenotazione, 
                    'dataVisita' => $model->dataVisita,
                    'oraVisita' => $model->oraVisita]);
                 }
            ],
        ],
    ]); ?>


</div>
