<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Diagnosi */

$this->title = 'Update Diagnosi: ' . $model->idUtente;
$this->params['breadcrumbs'][] = ['label' => 'Diagnosis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idUtente, 'url' => ['view', 'idUtente' => $model->idUtente, 'idLogopedista' => $model->idLogopedista, 'idCaregiver' => $model->idCaregiver, 'dataDiagnosi' => $model->dataDiagnosi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="diagnosi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
