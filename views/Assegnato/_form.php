<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Assegnato */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assegnato-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idTerapia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idEsercizio')->textInput() ?>

    <?= $form->field($model, 'risposta')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>