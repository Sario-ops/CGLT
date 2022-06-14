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
    <? 
    ?>
    
    <table id="logopedista-activity">
        <tr>
            <td>
                <?= Html::a('<h3>CREA TERAPIA</h3>', ['/terapia\create', 'username' => $model->username], ['class' => 'btn btn-primary']) ?>
            </td>
            <td>
                <?= Html::a('<h3>CREA ESERCIZIO</h3>', ['/esercizio'], ['class' => 'btn btn-primary']) ?>
            </td>
            <td>
                <?= Html::a('<h3>MEMORIZZA DIAGNOSI</h3>', ['diagnosi'], ['class' => 'btn btn-primary']) ?>
            </td>
            <td>
                <?= Html::a('<h3>PIANIFICA VISITA</h3>', ['createvisita'], ['class' => 'btn btn-primary']) ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= Html::a('<h3>VISUALIZZA UTENTI</h3>', ['visualizza'], ['class' => 'btn btn-primary']) ?> 
            </td>
            <td>
                <?= Html::a('<h3>VISUALIZZA VISITE</h3>', ['visita'], ['class' => 'btn btn-primary']) ?> 
            </td>
            <td>
                <?= Html::a('<h3>MONITORA TERAPIA</h3>', ['terapia'], ['class' => 'btn btn-primary']) ?> 
            </td>
            <td>
                <?= Html::a('<h3>CODICI ISCRIZIONE</h3>', ['/codice', 'username' => $model->username], ['class' => 'btn btn-primary']) ?> 
            </td>
        </tr>
    </table>
</div>
