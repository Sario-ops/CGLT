<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Login Logopedista';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Perfavore, compila i seguenti campi per il login:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput(['value' => '']) ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"offset-lg-1 col-lg-3 custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <p>
            Non sei ancora registrato? <?= Html::a('Registrati', ['create']) ?>
        </p>
        <p>
            <?= Html::a('Password dimenticata?', ['recupera']) ?>
        </p>

        <div class="form-group">
            <div class="offset-lg-1 col-lg-11">
                <button class="btn btn-primary" id="buttonPassword" onclick="hidePassword()">Login</button>
                <?= Html::submitButton('', ['class' => 'disabled', 'id' => 'submitPassw']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
</div>
