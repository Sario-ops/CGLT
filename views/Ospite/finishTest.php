<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'Risultato Test';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(($result/$numeroDomande)*100 > 50):?>
        <p><h2>COMPLIMENTI</h2><br>hai fatto un ottima prova</p>
    <?php endif;?>
    <p>
        Il tuo risultato:<?= Html::encode($result) ?>/<?= Html::encode($numeroDomande) ?>
    </p>

</div>  


