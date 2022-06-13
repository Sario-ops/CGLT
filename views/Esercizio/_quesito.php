<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Quesito;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="address-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'esercizio_id',
            'domanda',
            'opzioni_risposta',
            'risposta_corretta',
            'domanda_immagine'
        ],
    ]); ?>

</div>
