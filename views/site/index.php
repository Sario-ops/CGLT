<?php

/** @var yii\web\View $this */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;


$this->title = 'LOGIN';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">BENVENUTO!</h1>
        <p class="lead"></p>
    </div>

    <div class="body-content">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>Please fill out the following fields to login:</p>

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n{input}\n{error}",
                'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                'inputOptions' => ['class' => 'col-lg-3 form-control'],
                'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
            ],
        ]); ?>

        <!-- <//?= $form->radioButtonList($model, 'actor', array(0 => 'Logopedista', 1 => 'Caregiver', 2 => 'Utente'),  array('separator' => " | ")) ?> -->

        <?= $form->field($model, 'actor')->radioList(array('L' => 'Logopedista', 'C' => 'Caregiver', 'U' => 'Utente')) ?>
        
        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"offset-lg-1 col-lg-3 custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div class="offset-lg-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>