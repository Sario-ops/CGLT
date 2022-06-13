<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Terapia */

$request = Yii::$app->request;
$ID = $request->get('ID');

$this->title = $model->ID;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="terapia-visualizza">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<< Back', ['/caregiver\terapia'], ['class' => 'btn btn-danger',]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idUtente',
            'idLogopedista',
            'ID',
        ],
    ]) ?>
     
     <?= Html::a('Esercizi assegnati', ['/assegnato\index', 'idTerapia' => $model->ID], ['class' => 'btn btn-primary']) ?>

    </div>
