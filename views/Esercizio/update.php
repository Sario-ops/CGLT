<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $modelEsercizio app\modelEsercizios\Esercizio */

$this->title = 'Update Esercizio: ' . $modelEsercizio->id;
$this->params['breadcrumbs'][] = ['label' => 'Esercizios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelEsercizio->id, 'url' => ['view', 'id' => $modelEsercizio->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="esercizio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelEsercizio' => $modelEsercizio,
        'modelsQuesito' => $modelsQuesito
    ]) ?>

</div>
