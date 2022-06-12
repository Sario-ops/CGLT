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

    <p>
        <?= Html::a('Nuovo Esercizio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

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
                'attribute' => 'rating',
                'label' => 'Indice Gradimento',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Esercizio $model, $key, $index, $column) {
                    if( $action !== 'delete' && $action !== 'update') {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    } else if ( ($action === 'delete' || $action === 'update') && $model->idLogopedista === Yii::$app->logopedista->identity->username ) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                 }
            ],
        ],
    ]); ?>


</div>
