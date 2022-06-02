<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Diagnosi;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UtenteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$request = Yii::$app->request;
$username = $request->get('username');

$this->title = 'Diagnosi';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="diagnosi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nuova Diagnosi', ['/diagnosi\create', 'model' => $model, 'username' => $username], ['class' => 'btn btn-success']) ?>
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
                    if( $action == 'delete') {
                        return Url::toRoute([$action, 'idLogopedista' => $model->idLogopedista]);
                    }
                }
            ],
        ],
    ]); ?>

</div>