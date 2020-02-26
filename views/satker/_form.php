<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
/* @var $this yii\web\View */
/* @var $model app\models\Satker */
/* @var $form yii\widgets\ActiveForm */



$this->registerJs('
$(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    $(".dynamicform_wrapper .panel-title-address").each(function(index) {
        $(this).html("Address: " + (index + 1))
        console.log("arwan")
    });
});

$(".dynamicform_wrapper").on("afterDelete", function(e) {

    $(".dynamicform_wrapper .panel-title-address").each(function(index) {

        $(this).html("Address: " + (index + 1))
    });
});
                  ');
?>

<div class="satker-form">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3>
                <b>
                    Form
                </b>
            </h3>
        </div>
        <?php $form = ActiveForm::begin(['options' => ['id' => 'satker-form']]); ?>
        <div class="card-body">
            <?php DynamicFormWidget::begin([

                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]

                'widgetBody' => '.container-items', // required: css class selector

                'widgetItem' => '.item', // required: css class

                'limit' => 4, // the maximum times, an element can be cloned (default 999)

                'min' => 1, // 0 or 1 (default 1)

                'insertButton' => '.add-item', // css class

                'deleteButton' => '.remove-item', // css class

                'model' => $models[0],

                'formId' => 'satker-form', //harus sama dengan id form

                'formFields' => [

                    'nama_satker',

                ],

            ]); ?>

            <div class="panel panel-default">

                <div class="panel-heading">

                    <i class="fa fa-envelope"></i> Address Book

                    <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add address</button>

                    <div class="clearfix"></div>

                </div>

                <div class="panel-body container-items">
                    <!-- widgetContainer -->

                    <?php foreach ($models as $index => $model) : ?>

                        <div class="item panel panel-default">
                            <!-- widgetBody -->

                            <div class="panel-heading">

                                <span class="panel-title-address">Address: <?= ($index + 1) ?></span>

                                <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>

                                <div class="clearfix"></div>

                            </div>

                            <div class="panel-body">

                                <?php

                                // necessary for update action.

                                if (!$model->isNewRecord) {

                                    echo Html::activeHiddenInput($model, "[{$index}]id");
                                }

                                ?>

                                <?= $form->field($model, "[{$index}]nama_satker")->textInput(['maxlength' => true]) ?>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

            <?php DynamicFormWidget::end(); ?>
        </div>
        <div class="card-footer">
            <div class="form-group">
                <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>

    </div>

</div>