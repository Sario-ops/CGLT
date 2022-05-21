<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use app\models\Logopedista;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LogopedistaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logopedista';
//$this->title = sprintf($this->title, $model->nome);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <p>Nome: <?= Html::encode($model->nome) ?></p>
</div>