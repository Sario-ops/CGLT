<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Caregiver;
use yii\grid\ActionColumn;
use yii\bootstrap4\ActiveForm;
use webzop\notifications\widgets\Notifications;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LogopedistaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Caregiver';
?>
<div class="site-index">

    <?php echo Notifications::widget() ?>
    <h1><?= Html::encode($model->nome),' ', Html::encode($model->cognome) ?></h1>

    <table id="caregiver-activity">
        <tr>
            <td>
                <?= Html::a('VALIDA ESERCIZI', ['esercizi_da_validare'], ['class' => 'btn btn-primary']) ?>
            </td>
            <td>
                <?= Html::a('RECAP', ['../terapia\recap'], ['class' => 'btn btn-primary']) ?>
            </td>
            </td>
        </tr>
    </table>
</div>