<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Terapia;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TerapiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$request = Yii::$app->request;
$username = $request->get('idLogopedista');

$this->title = 'Visualizza Terapia';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="terapia-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('../terapia/_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idUtente',
            'idLogopedista',
            'ID',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Terapia $model, $key, $index, $column) {
                    if ($action !== 'delete') {
                        return Url::toRoute([$action, 'ID' => $model->idUtente]);
                    }
                 }
            ],
        ],
    ]); ?>


</div>