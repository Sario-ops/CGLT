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

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'dataNascita')->textInput(['placeholder' => 'YYYY-MM-DD']) ?> 

    <?= $form->field($model, 'idCaregiver')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idLogopedista')->textInput(['maxlength' => true]) ?>

    <?
    $update = Yii::$app()->db->createCommand()
              ->update('utente', 
                   array(
                      'logopedista' => "ciao@gmail.com",
                   ),
                   'username='.'utente@gmail.com'
              );
    ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
