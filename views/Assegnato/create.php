<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Assegnato */

$this->title = 'Create Assegnato';
$this->params['breadcrumbs'][] = ['label' => 'Assegnatos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assegnato-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
