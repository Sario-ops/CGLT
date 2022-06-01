<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VisitaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pianificazione Visita';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visita-index">

<h1><?= Html::encode($this->title) ?></h1>

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

<?= $form->field($model, 'idUtente') ?>
<?= $form->field($model, 'idLogopedista') ?>
<?= $form->field($model, 'idCaregiver') ?>
<?= $form->field($model, 'nomeUtente') ?>
<?= $form->field($model, 'cognomeUtente') ?>
<?= $form->field($model, 'dataPrenotazione') ?>
<?= $form->field($model, 'dataVisita') ?>
<?= $form->field($model, 'oraVisita') ?>


<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
