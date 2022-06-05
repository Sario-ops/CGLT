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

    <h2><?=Html::encode($esercizio->nome)?></h2>
    <h4><?=Html::encode($esercizio->descrizione)?></h4>
    <?php
        $form = ActiveForm::begin([
            'method' => 'post',
        ]);?>


    <div class="form-group">
        <input class="disabled" value="1" />
        <?php foreach ($quesiti as $i => $quesito): ?>

            <?php if ($quesito->domanda_immagine) : ?>
                <?= Html::img('@web/image/esercizi/'.$quesito->esercizio_id.'/'.$quesito->domanda_immagine) ?>
            <?php endif; ?>

            
            <p><?=Html::encode($quesito->domanda)?></p>

            <?php if (!$esercizio->conCaregiver) : ?>
                <?= $form->field($esercizio, "risposte[$i]")->radioList($quesito->getArrayOptions()) ?>
            <?php endif; ?>

        <?php endforeach; ?>

        <?= Html::submitButton('Finish', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>