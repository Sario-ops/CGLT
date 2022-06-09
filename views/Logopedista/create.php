<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Logopedista */

$this->title = 'Registra Logopedista';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logopedista-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
