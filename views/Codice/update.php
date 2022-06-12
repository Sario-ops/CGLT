<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Codice */

$this->title = 'Update Codice: ' . $model->codice;
$this->params['breadcrumbs'][] = ['label' => 'Codices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codice, 'url' => ['view', 'codice' => $model->codice]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="codice-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
