<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Logopedista */

$this->title = 'Update Logopedista: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' =>  'Profilo', 'url' => ['view', 'username' => $model->username]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="logopedista-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
