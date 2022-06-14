<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Diagnosi;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DiagnosiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$request = Yii::$app->request;
$username = $request->get('id');

$this->title = 'Visualizza Diagnosi';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="diagnosi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Crea Diagnosi', ['/diagnosi/create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idUtente',
            // 'idLogopedista',
            'dataDiagnosi',
            // 'descrizioneDiagnosi',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Diagnosi $model, $key, $index, $column) {
                    if( $action == 'delete') {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                }
            ],
        ],
    ]); ?>


</div>
