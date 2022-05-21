<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Logopedista */

$this->title = 'Update Logopedista: ' . $model->email;
$this->params['breadcrumbs'][] = ['label' => 'Logopedistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->email, 'url' => ['view', 'email' => $model->email]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="logopedista-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
