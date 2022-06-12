<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$username = Yii::$app->request;
$ID = Yii::$app->security->generateRandomString(8);
/* @var $this yii\web\View */
/* @var $model app\models\Codice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="codice-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codice')->textInput(['value' => $ID, 'readonly'=> true]) ?>

    <?= $form->field($model, 'logopedista')->textInput(['value' => $username->get('username'),'readonly'=> true]) ?>

    <?= $form->field($model, 'utente')->textInput(['maxlength' => true]) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
