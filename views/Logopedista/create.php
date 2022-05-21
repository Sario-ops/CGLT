<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Logopedista */

$this->title = 'Registrazione Logopedista';
$this->params['breadcrumbs'][] = ['label' => 'Logopedista', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logopedista-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
