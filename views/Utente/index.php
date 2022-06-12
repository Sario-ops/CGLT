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

$this->title = 'UTENTE';
?>
<div class="utente-index">
    <h1><?=Html::encode($model->nome), ' ', Html::encode($model->cognome) ?></h1>


    <table id="utente-activity">
        <tr>
            <td>
                <?= Html::a('<h4>TERAPIA</h4>', ['terapia'], ['class' => 'btn btn-primary']) ?>
            </td>
            <td>
                <?= Html::a('<h4>ESERCIZI LIBERI</h4>', ['esercizi'], ['class' => 'btn btn-primary']) ?>
            </td>
        </tr>
    </table>
</div>