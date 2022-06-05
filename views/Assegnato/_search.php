<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AssegnatoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assegnato-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idTerapia') ?>

    <?= $form->field($model, 'idEsercizio') ?>

    <?= $form->field($model, 'risposta') ?>

    <?= $form->field($model, 'stato') ?>

    <?php // echo $form->field($model, 'valutazione') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
