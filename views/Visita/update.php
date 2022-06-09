<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Visita */

$this->title = 'Update Visita: ' . $model->idUtente;
$this->params['breadcrumbs'][] = ['label' => 'Visitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idUtente, 'url' => ['view', 'idUtente' => $model->idUtente, 'idLogopedista' => $model->idLogopedista, 'idCaregiver' => $model->idCaregiver, 'dataVisita' => $model->dataVisita, 'oraVisita' => $model->oraVisita]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="visita-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
