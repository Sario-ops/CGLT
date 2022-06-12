<?php


use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use app\models\Logopedista;
use yii\bootstrap4\ActiveForm;
use webzop\notifications\widgets\Notifications;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LogopedistaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logopedista';
?>
<div class="site-index">
    <h1><?=Html::encode($model->nome), ' ', Html::encode($model->cognome) ?></h1>

    <table id="logopedista-activity">
        <tr>
            <td>
                <?= Html::a('CREA TERAPIA', ['/terapia', 'username' => $model->username], ['class' => 'btn btn-primary']) ?>
            </td>
            <td>
                <?= Html::a('CREA ESERCIZIO', ['/esercizio'], ['class' => 'btn btn-primary']) ?>
            </td>
            <td>
                <?= Html::a('CREA DIAGNOSI', ['/diagnosi\create', 'model' => $model, 'username' => $model->username], ['class' => 'btn btn-primary']) ?>
            </td>
            <td>
                <?= Html::a('PIANIFICA VISITA', ['/visita\create', 'model' => $model, 'username' => $model->username], ['class' => 'btn btn-primary']) ?> 
            </td>
        </tr>
        <tr>
            <td>
                <?= Html::a('VISUALIZZA DIAGNOSI', ['/diagnosi\index', 'model' => $model, 'username' => $model->username], ['class' => 'btn btn-primary']) ?>
            </td>
            <td>
                <?= Html::a('VISUALIZZA UTENTI', ['visualizza', 'utenti' => $model->getUtentes()], ['class' => 'btn btn-primary']) ?> 
            </td>
            <td>
                <?= Html::a('VISUALIZZA VISITE', ['/visita\index', 'model' => $model, 'username' => $model->username], ['class' => 'btn btn-primary']) ?> 
            </td>
            <td>
                <?= Html::a('CODICI ISCRIZIONE', ['/codice', 'username' => $model->username], ['class' => 'btn btn-primary']) ?> 
            </td>
        </tr>
    </table>
</div>
