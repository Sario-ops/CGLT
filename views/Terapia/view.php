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
<div class="terapia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ID' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idUtente',
            'idLogopedista',
            'ID',
        ],
    ]) ?>
     
     <?= Html::a('Aggiungi esercizi', ['/assegnato\create', 'ID' => $model->ID], ['class' => 'btn btn-primary']) ?>
     <?= Html::a('Esercizi assegnati', ['/assegnato\index', 'ID' => $model->ID], ['class' => 'btn btn-primary']) ?>

    </div>
