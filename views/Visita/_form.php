<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Visita */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visita-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idUtente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idLogopedista')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idCaregiver')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomeUtente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cognomeUtente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dataPrenotazione')->textInput() ?>

    <?= $form->field($model, 'dataVisita')->textInput() ?>

    <?= $form->field($model, 'oraVisita')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
