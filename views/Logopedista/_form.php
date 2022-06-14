<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Logopedista */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="logopedista-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cognome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <input type="checkbox" onclick="myFunction()">Show Password

    <script> 
        function myFunction() {
        var x = document.getElementById("logopedista-password");
        if (x.type === "password") {
            x.type = "text";
        } else {
                  x.type = "password";
            }
            }
     </script>

    <br>
    <br>

    <div class="form-group">
        <button class="btn btn-primary" id="buttonPassword" onclick="hidePassword()">Registrati</button>
        <?= Html::submitButton('', ['class' => 'disabled', 'id' => 'submitPassw']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
