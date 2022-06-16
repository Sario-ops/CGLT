<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Utente */

$this->title = "Profilo";
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="utente-view">

    <h1><?= Html::encode($model->username) ?></h1>

    <p>
        <!-- <//?= Html::a('Delete', ['delete', 'username' => $model->username], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome',
            'cognome',
            'cf',
            'username',
            'dataNascita',
            'idCaregiver',
            'idLogopedista',
        ],
    ]) ?>

</div>
