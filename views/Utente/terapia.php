<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Assegnato;
use app\models\Esercizio;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EsercizioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Esercizi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="esercizio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idTerapia', 'idEsercizio', 'stato', 'valutazione', 'risposta',
            [
                'class' => ActionColumn::className(),
                'template'=>'{execute}',
                'buttons' => [
                    'execute' => function ($url, Assegnato $model ) {
                        return  Html::a('esegui', ['eseguiassegnato', 'idAssegnato' => $model->id], ['title' => Yii::t('yii', 'Esegui')]);
                    }
                ],
            ],
        ],
    ]); ?>


</div>