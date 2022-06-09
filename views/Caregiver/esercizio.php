<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use app\models\Caregiver;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LogopedistaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Esegui Esercizio';
?>
<div class="execute-index">

    <h2>Utente: <?=Html::encode($utente->nome)?>  <?=Html::encode($utente->cognome)?></h2>
    <h3><?=Html::encode($esercizio->nome)?></h3>
    <h4><?=Html::encode($esercizio->descrizione)?></h4>
    <?php
        $form = ActiveForm::begin([
            'method' => 'post',
        ]);?>


    <div class="form-group">
        <?php foreach ($esercizio->quesitos as $i => $quesito): ?>

            <?php if ($quesito->domanda_immagine) : ?>
                <?= Html::img('@web/image/esercizi/'.$quesito->esercizio_id.'/'.$quesito->domanda_immagine) ?>
            <?php endif; ?>

            
            <p><?=Html::encode($quesito->domanda)?></p>

            <?= $form->field($esercizio, "risposte[$i]")->radioList(['ottimo', 'buono', 'discreto']) ?>

        <?php endforeach; ?>

        <?= Html::submitButton('Finish', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>