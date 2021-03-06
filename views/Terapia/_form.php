<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$request = Yii::$app->request;
$ID = Yii::$app->security->generateRandomString(5);
/* @var $this yii\web\View */
/* @var $model app\models\Terapia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="terapia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idUtente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idLogopedista')->textInput(['value' => $request->get('username'),'readonly'=> true]) ?>

    <?= $form->field($model, 'ID')->textInput(['value' => $ID, 'readonly'=> true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success',]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
