<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Address */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="address-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'esercizio_id')->textInput() ?>

    <?= $form->field($model, 'domanda')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'opzioni_risposta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'risposta_corretta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'domanda_immagine')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
