<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Codice */

$this->title = $model->codice;
$this->params['breadcrumbs'][] = ['label' => 'Codices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="codice-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'codice' => $model->codice], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'codice' => $model->codice], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'codice',
            'logopedista',
            'utente',
        ],
    ]) ?>

</div>
