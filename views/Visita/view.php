<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Visita */

$this->title = $model->idUtente;
$this->params['breadcrumbs'][] = ['label' => 'Visitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="visita-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idUtente' => $model->idUtente, 'idLogopedista' => $model->idLogopedista, 'dataVisita' => $model->dataVisita, 'oraVisita' => $model->oraVisita], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idUtente' => $model->idUtente, 'idLogopedista' => $model->idLogopedista, 'dataVisita' => $model->dataVisita, 'oraVisita' => $model->oraVisita], [
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
            'dataPrenotazione',
            'dataVisita',
            'oraVisita',
            'stato',
        ],
    ]) ?>

</div>
