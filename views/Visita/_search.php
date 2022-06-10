<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VisitaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visita-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idUtente') ?>

    <?= $form->field($model, 'idLogopedista') ?>

    <?= $form->field($model, 'idCaregiver') ?>

    <?= $form->field($model, 'nomeUtente') ?>

    <?php // echo $form->field($model, 'cognomeUtente') ?>

    <?php // echo $form->field($model, 'dataPrenotazione') ?>

    <?php // echo $form->field($model, 'dataVisita') ?>

    <?php // echo $form->field($model, 'oraVisita') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
