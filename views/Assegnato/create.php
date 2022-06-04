<?php

use yii\helpers\Html;
use app\models\Esercizio;
/* @var $this yii\web\View */
/* @var $model app\models\Assegnato */

$this->title = 'Assegna esercizio';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assegnato-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    <?php
    /*$esercizi=getAllExercise();
    echo $esercizi;*/
    ?>
</div>
