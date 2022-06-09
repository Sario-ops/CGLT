<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$request = Yii::$app->request;
$username = $request->get('username');

/* @var $this yii\web\View */
/* @var $model app\models\Visita */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visita-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idUtente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idLogopedista')->textInput(['value' => $username, 'readonly'=> true]) ?>

    <?= $form->field($model, 'idCaregiver')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomeUtente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cognomeUtente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dataPrenotazione')->textInput(['placeholder' => 'YYYY-MM-DD']) ?>

    <?= $form->field($model, 'dataVisita')->textInput(['placeholder' => 'YYYY-MM-DD']) ?>

    <?= $form->field($model, 'oraVisita')->textInput(['placeholder' => 'hh:mm']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
