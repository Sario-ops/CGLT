<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Codice */
/* @var $form ActiveForm */
$this->title = 'Inserisci il codice Iscrizione dato dal tuo Logopedista';
?>
<div class="Utente-codice">

    <h2><?= Html::encode($this->title) ?></h2>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'codice') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- Utente-codice -->
