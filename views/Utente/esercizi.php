<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
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
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',
            'descrizione',
            'categoria',
            'conCaregiver',
            [
                'class' => ActionColumn::className(),
                'template'=>'{execute}',
                'buttons' => [
                    'execute' => function ($url, Esercizio $model ) {
                        if($model->conCaregiver) {
                            return Html::a('esegui', ['permission', 'id' => $model->id], ['title' => Yii::t('yii', 'Esegui')]);
                        } 
                        return  Html::a('esegui', $url, ['title' => Yii::t('yii', 'Esegui')]);
                    }
                ],
            ],
        ],
    ]); ?>


</div>
