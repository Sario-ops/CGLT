<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Utente */

$this->title = 'Registra Utente';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utente-create">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= $this->render('_form', [
        'model' => $model,
        'utente' => $utente,
        'logopedista' => $logopedista,
    ]) ?>

</div>
