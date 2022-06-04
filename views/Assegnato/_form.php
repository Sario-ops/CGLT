<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$request = Yii::$app->request;

/* @var $this yii\web\View */
/* @var $model app\models\Assegnato */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assegnato-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idTerapia')->textInput(['value' => $request->get('ID'),'readonly'=> true]) ?>

    <?= $form->field($model, 'idEsercizio')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Aggiungi', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
