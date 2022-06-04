<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Terapia */

$this->title = 'Crea Terapia';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terapia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model
        ]) ?>

</div>
