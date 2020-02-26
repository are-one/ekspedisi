<?php

use yii\helpers\Html;
use yii\web\View;
use yii\bootstrap4\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
/* @var $this yii\web\View */
/* @var $model app\models\Satker */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs('
$(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    $(".dynamicform_wrapper .card-title").each(function(index) {
        $(this).html("Satker: " + (index + 1))
    });
});

$(".dynamicform_wrapper").on("afterDelete", function(e) {

    $(".dynamicform_wrapper .card-title").each(function(index) {

        $(this).html("Satker: " + (index + 1))
    });
});', View::POS_END);
?>

<div class="satker-form">

    <?php $form = ActiveForm::begin(['options' => ['id' => 's-form']]); ?>

    <?php DynamicFormWidget::begin([

        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]

        'widgetBody' => '.container-items', // required: css class selector

        'widgetItem' => '.item', // required: css class

        'limit' => 10, // the maximum times, an element can be cloned (default 999)

        'min' => 1, // 0 or 1 (default 1)

        'insertButton' => '.add-item', // css class

        'deleteButton' => '.remove-item', // css class

        'model' => $models[0],

        'formId' => 's-form', //harus sama dengan id form

        'formFields' => [

            'nama_satker',

        ],

    ]); ?>

    <div class="card card-primary card-outline">

        <div class="card-header">
            <h4 class="d-inline">
                <i class="fas fa-building"></i> Data Satker
            </h4>

            <div class="card-tools">
                <button type="button" class="add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Tambah Satker</button>
            </div>
        </div>

        <div class="card-body container-items">
            <!-- widgetContainer -->

            <?php foreach ($models as $index => $model) :
            ?>

                <div class="item card card-default">
                    <!-- widgetBody -->

                    <div class="card-header">

                        <span class="card-title">Satker: <?= ($index + 1) ?></span>

                        <div class="card-tools">
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">

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

        <div class="card-footer">
            <div class="form-group">
                <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php DynamicFormWidget::end(); ?>

    <?php ActiveForm::end(); ?>

</div>