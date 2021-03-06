<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Terapia;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TerapiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Terapia';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terapia-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Terapia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idUtente',
            'idLogopedista',
            'ID',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Terapia $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
