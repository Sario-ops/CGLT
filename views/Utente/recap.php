<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Assegnato;
use app\models\Esercizio;
use yii\grid\ActionColumn;
use dosamigos\chartjs\ChartJs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EsercizioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recap';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recap-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
    <div class="col-6">
        <?= ChartJs::widget([
    'type' => 'pie',

    'options' => [
        'height' => 250,
        'width' => 400
    ],
    'data' => [
        'labels' => [
            'Red',
            'Blue',
            'Yellow'
          ],
        'datasets' => [
            [
                'label' => "My Second dataset",
                'backgroundColor' => [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                  ],
                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                'data' => $esercizio
                ]
            ]
        ]
    ]);
    ?>
    </div>
    <div class="col-6">
        <?= ChartJs::widget([
    'type' => 'pie',
    'options' => [
        'height' => 250,
        'width' => 400
    ],
    'data' => [
        'labels' => [
            'Red',
            'Blue',
            'Yellow'
          ],
        'datasets' => [
            [
                'label' => "My Second dataset",
                'backgroundColor' => [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                  ],
                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                'data' => [300, 50, 100],
                ]
            ]
        ]
    ]);
    ?>
    </div>
    </div>

</div>