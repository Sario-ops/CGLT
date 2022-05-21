<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LogopedistaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="logopedista-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'giorno_nascita') ?>

    <?= $form->field($model, 'mese_di_nascita') ?>

    <?php // echo $form->field($model, 'anno_di_nascita') ?>

    <?php // echo $form->field($model, 'Codice_catastale_comune') ?>

    <?php // echo $form->field($model, 'CODICE_FISCALE') ?>

    <?php // echo $form->field($model, 'EMAIL') ?>

    <?php // echo $form->field($model, 'PASSWORD') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
