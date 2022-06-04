<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Esercizio */

$this->title = 'Crea Esercizio';
$this->params['breadcrumbs'][] = ['label' => 'Esercizi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="esercizio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelEsercizio' => $modelEsercizio,
        'modelsQuesito' => $modelsQuesito
    ]) ?>

</div>
