<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DiagnosiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diagnosi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <!-- <//?= $form->field($model, 'idUtente') ?> -->

    <!-- <//?= $form->field($model, 'idLogopedista') ?> -->

    <!-- <//?= $form->field($model, 'dataDiagnosi') ?> -->

    <!-- <//?= $form->field($model, 'descrizioneDiagnosi') ?> -->

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
