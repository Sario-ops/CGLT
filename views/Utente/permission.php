<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Conferma assistenza Caregiver';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caregiver-assistance">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'id' => 'caregiver-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
        'method' => 'post',
    ]); ?>

        <?= $form->field($caregiver, 'assistenzaPassword')->passwordInput(['value' => '']) ?>

        <div class="form-group">
            <div class="offset-lg-1 col-lg-11">
                <button class="btn btn-primary" id="buttonPassword" onclick="hidePassword()">Conferma</button>
                <?= Html::submitButton('', ['class' => 'disabled', 'id' => 'submitPassw']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
</div>
