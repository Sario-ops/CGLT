<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
?>
<h1>TEST AUTOVALUTAZIONE</h1>
<p>
    <?php
    $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]);?>


<div class="form-group">
    <p><?= Html::encode($question) ?></p>
    <?= $form->field($model, 'lastResponse')->radioList($model->getArrayResponse()) ?>

    <?= Html::submitButton('Go', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
</div>

<?php ActiveForm::end(); ?>

</p>