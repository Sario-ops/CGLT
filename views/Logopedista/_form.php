<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Logopedista */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="logopedista-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'giorno_nascita')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mese_di_nascita')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anno_di_nascita')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Codice_catastale_comune')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CODICE_FISCALE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EMAIL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PASSWORD')->passwordInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
