<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EsercizioAssegnato */

$this->title = 'Create Esercizio Assegnato';
$this->params['breadcrumbs'][] = ['label' => 'Esercizio Assegnatos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="esercizio-assegnato-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
