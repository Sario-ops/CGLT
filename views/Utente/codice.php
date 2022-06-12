<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Codice */
/* @var $form ActiveForm */
?>
<div class="Utente-codice">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'codice') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- Utente-codice -->
