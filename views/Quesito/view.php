<?php

use yii\helpers\Html;
use app\models\Esercizio;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Address */

$this->title = $model->domanda;
$this->params['breadcrumbs'][] = ['label' => 'Esercizi', 'url' => ['/esercizio/index']];
$this->params['breadcrumbs'][] = ['label' => "$model->esercizio_id", 'url' => ['/esercizio/view', 'id' => $model->esercizio_id]];
$this->params['breadcrumbs'][] = ['label' => 'Quesiti', 'url' => ['index', 'idEsercizio' => $model->esercizio_id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="address-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <//?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <//?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'esercizio_id',
            'domanda',
            'opzioni_risposta',
            'risposta_corretta',
            [
                'attribute' => 'domanda_immagine',
                'value' => Yii::getAlias('@web/image/esercizi').'/'.$model->esercizio_id.'/'.$model->domanda_immagine,
                'format' => ['image', ['width' => '100', 'height' => '100']],
            ],
        ],
    ]) ?>

</div>
