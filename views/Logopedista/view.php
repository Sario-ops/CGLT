<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Logopedista */

$this->title = "Profilo";
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="logopedista-view">

    <h1><?= Html::encode($model->username) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'username' => $model->username], ['class' => 'btn btn-primary']) ?>
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
            'password',
        ],
    ]) ?>

</div>
