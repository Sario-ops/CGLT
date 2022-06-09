<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Diagnosi */

$this->title = $model->idUtente;
$this->params['breadcrumbs'][] = ['label' => 'Diagnosi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="diagnosi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idUtente' => $model->idUtente, 'idLogopedista' => $model->idLogopedista, 'idCaregiver' => $model->idCaregiver, 'dataDiagnosi' => $model->dataDiagnosi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idUtente' => $model->idUtente, 'idLogopedista' => $model->idLogopedista, 'idCaregiver' => $model->idCaregiver, 'dataDiagnosi' => $model->dataDiagnosi], [
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
            'idCaregiver',
            'nomeUtente',
            'cognomeUtente',
            'dataDiagnosi',
            'descrizioneDiagnosi',
        ],
    ]) ?>

</div>
