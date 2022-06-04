<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
?>

<div class="esercizio-form">

    <?php $form = ActiveForm::begin(['options' => [
            'enctype' => 'multipart/form-data',
            'id' => 'dynamic-form'
        ]]); ?>
        <?= $form->field($modelEsercizio, 'nome')->textInput(['maxlength' => true]) ?>
        <?= $form->field($modelEsercizio, 'descrizione')->textInput(['maxlength' => true]) ?>
        <?= $form->field($modelEsercizio, 'categoria')->textInput(['maxlength' => true]) ?>
        <?= $form->field($modelEsercizio, 'conCaregiver')->checkbox([
            'template' => "<div class=\"offset-lg-1 col-lg-3 custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ]) ?>

    <div class="panel panel-default">
        <div class="panel-heading"><h3><i class="glyphicon glyphicon-envelope"></i> QUESITI</h3></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 999, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsQuesito[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'domanda',
                    'opzioni_risposta',
                    'risposta_corretta',
                    'domanda_immagine',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsQuesito as $i => $modelQuesito): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h4 class="panel-title pull-left">QUESITO</h4>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelQuesito->isNewRecord) {
                                echo Html::activeHiddenInput($modelQuesito, "[{$i}]id");
                            }
                        ?>
                        <?= $form->field($modelQuesito, "[{$i}]domanda")->textInput(['maxlength' => true]) ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelQuesito, "[{$i}]opzioni_risposta")->textInput(['maxlength' => true, 'placeholder' => 'opzione1&opzione2&..']) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelQuesito, "[{$i}]risposta_corretta")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <?= $form->field($modelQuesito, "[{$i}]domanda_immagine")->fileInput() ?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($modelQuesito->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>