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

    <?= $form->field($model, 'idUtente') ?>

    <?= $form->field($model, 'idLogopedista') ?>

    <?= $form->field($model, 'idCaregiver') ?>

    <?= $form->field($model, 'nomeUtente') ?>

    <?= $form->field($model, 'cognomeUtente') ?>

    <?= $form->field($model, 'dataPrenotazione') ?>

    <?= $form->field($model, 'dataVisita') ?>

    <?= $form->field($model, 'oraVisita') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
