<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Codice */
$username = Yii::$app->request;

$this->title = 'Create Codice';
$this->params['breadcrumbs'][] = ['label' => 'Codice', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="codice-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
