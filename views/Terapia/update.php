<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Terapia */

$this->title = 'Update Terapia: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Terapias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="terapia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
