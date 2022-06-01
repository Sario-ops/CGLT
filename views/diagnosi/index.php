<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Diagnosi;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DiagnosiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Creazione Diagnosi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnosi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Diagnosi', ['create'], ['class' => 'btn btn-success']) ?>
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
            'dataDiagnosi',
            'descrizioneDiagnosi',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Diagnosi $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idUtente' => $model->idUtente, 
                    'idLogopedista' => $model->idLogopedista, 
                    'idCaregiver' => $model->idCaregiver, 
                    'nomeUtente' => $model->nomeUtente,
                    'cognomeUtente' => $model->cognomeUtente,
                    'dataDiagnosi' => $model->dataDiagnosi, 
                    'descrizioneDiagnosi' => $model->descrizioneDiagnosi]);
                 }
            ],
        ],
    ]); ?>


</div>
