<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Assegnato;
use yii\grid\ActionColumn;

$request = Yii::$app->request;
$username = $request->get('idTerapia');

/* @var $this yii\web\View */
/* @var $searchModel app\models\AssegnatoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assegnato';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assegnato-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idTerapia',
            'idEsercizio',
            // 'risposta',
            'stato',
            'valutazione',
        ],
    ]); ?>


</div>
