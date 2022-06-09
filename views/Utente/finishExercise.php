<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'Risultato Esercizio';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="exercise-about">
    <h1>COMPLIMENTI</h1>
    <h2>hai completato l'esercizio</h2>

    <?php if(!$conCaregiver) : ?>

        <?php if(($result/$numeroDomande)*100 > 50):?>
            <p><h2>BRAVO!!</h2><br>la tua è stata un'ottima prova</p>
        <?php endif;?>
        <p>
            Il tuo risultato:<?= Html::encode($result) ?>/<?= Html::encode($numeroDomande) ?>
        </p>

    <?php endif; ?>

    <?php if( $result > 0 || $conCaregiver):?>
        <iframe width="825" height="400" src="https://www.youtube.com/embed/sDvXhZtcp0w?autoplay=1" title="YouTube video player" frameborder="0" allow="autoplay;" allowfullscreen></iframe>
    <?php endif;?>

</div>  


