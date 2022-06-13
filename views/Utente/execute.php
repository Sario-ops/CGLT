<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Caregiver;
use yii\grid\ActionColumn;
use kartik\rating\StarRating;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Modal;

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

            <?php if ($quesito->getArrayOptions()[0] !== '')  : ?>
            <?= $form->field($esercizio, "risposte[$i]")->radioList($quesito->getArrayOptions(), ['value' => null]) ?>
            <?php endif; ?>

        <?php endforeach; ?>

        <?= Html::button('Finish', ['class' => 'btn btn-primary', 'id' => 'modalButton']) ?>
        <?php Modal::begin([
            'title' => '<h4>Feedback esercizio</h4>',
            'id' => 'modal',
            'size' => 'modal-lg'
        ]);

        echo '<div class="rating">
                <p>Valuta questo esercizio</p>
                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
             </div>',
             $form->field($esercizio, "rating")->textInput(['id' => 'resultRating', 'value' => '0']),
             Html::button("Vota", ["class" => "btn btn-primary", 'id' => 'rateButton']),
             Html::submitButton("Non adesso", ["class" => "btn btn-primary", 'id' => 'submitRate']);

        Modal::end();
        ?>

        <!-- <//?= Html::submitButton('Finish', ['class' => 'btn btn-primary']) ?> -->
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>