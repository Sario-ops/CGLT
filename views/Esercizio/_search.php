<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EsercizioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="esercizio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'ID') ?>
    
    
    <!-- <//?= $form->field($model, 'descrizione') ?>

    <//?= $form->field($model, 'feedback') ?>

    <//?= $form->field($model, 'risposte') ?> -->

    <?php // echo $form->field($model, 'conCaregiver') ?>

    <?php // echo $form->field($model, 'risposta_corretta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
