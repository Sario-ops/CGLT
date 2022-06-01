<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Diagnosi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diagnosi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idUtente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idLogopedista')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idCaregiver')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomeUtente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cognomeUtente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dataDiagnosi')->textInput() ?>

    <?= $form->field($model, 'descrizioneDiagnosi')->textArea(['rows' => 5]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
