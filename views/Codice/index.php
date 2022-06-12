<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Codice;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CodiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$username = Yii::$app->request;
$this->title = 'Codice';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="codice-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crea Codice', ['create', 'username' => $username->get('username')], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codice',
            'logopedista',
            'utente',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Codice $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'codice' => $model->codice]);
                 }
            ],
        ],
    ]); ?>


</div>
