<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Caregiver */

$this->title = "Profilo";
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="caregiver-view">

    <h1><?= Html::encode($model->username) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'username' => $model->username], ['class' => 'btn btn-primary']) ?>
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
