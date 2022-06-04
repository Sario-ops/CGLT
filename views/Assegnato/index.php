<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Assegnato;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AssegnatoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assegnatos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assegnato-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Assegnato', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idTerapia',
            'idEsercizio',
            'risposta',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Assegnato $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idTerapia' => $model->idTerapia, 'idEsercizio' => $model->idEsercizio]);
                 }
            ],
        ],
    ]); ?>


</div>
