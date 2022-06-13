<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Visita;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VisitaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$request = Yii::$app->request;
$username = $request->get('idLogopedista');

$this->title = 'Visualizza Visite';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="visita-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idUtente',
            // 'idLogopedista',
            'idCaregiver',
            //'nomeUtente',
            //'cognomeUtente',
            //'dataPrenotazione',
            'dataVisita',
            'oraVisita',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Visita $model, $key, $index, $column) {
                    if( $action == 'delete') {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                 }
            ],
        ],
    ]); ?>


</div>
