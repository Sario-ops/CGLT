<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Utente;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UtenteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Utenti';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nome',
            'cognome',
            'cf',
            'username',
            'dataNascita',
            'idCaregiver',
            //'password',
            //'authkey',
            //'idCaregiver',
            //'idLogopedista',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Utente $model, $key, $index, $column) {
                    if( $action == 'delete') {
                        return Url::toRoute([$action, 'username' => $model->username]);
                    }
                }
            ],
        ],
    ]); ?>


</div>
