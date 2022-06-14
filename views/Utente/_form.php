<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Utente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="utente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cognome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['value' => $utente, 'readonly'=> true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'dataNascita')->textInput(['placeholder' => 'YYYY-MM-DD']) ?> 

    <?= $form->field($model, 'idCaregiver')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idLogopedista')->textInput(['value' => $logopedista, 'readonly'=> true]) ?>

    <div class="form-group">
        <button class="btn btn-primary" id="buttonPassword" onclick="hidePassword()">Registrati</button>
        <?= Html::submitButton('', ['class' => 'disabled', 'id' => 'submitPassw']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
