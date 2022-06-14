<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Visita */

$this->title = $model->id;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="visita-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php if($model->stato == 0 && Yii::$app->request->get('tipo') != 'C'):?>
        
        <?= Html::a('Conferma visita',['/logopedista/confermavisita','id'=>$model->id], ['class' => 'btn btn-primary'])?>

        <?php endif;?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'idUtente',
            'idLogopedista',
            'dataPrenotazione',
            'dataVisita',
            'oraVisita',
            'stato',
        ],
    ]) ?>

</div>
