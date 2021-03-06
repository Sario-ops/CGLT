<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UtenteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="utente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'cognome') ?>

    <?= $form->field($model, 'cf') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'dataNascita') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'idCaregiver') ?>

    <?php // echo $form->field($model, 'idLogopedista') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
