<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Satker */
/* @var $form yii\widgets\ActiveForm */
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
        <?php $form = ActiveForm::begin(); ?>
        <div class="card-body">
            <?= $form->field($model, 'nama_satker')->textInput(['class' => 'form-control', 'placeholder' => 'nama satker']) ?>

        </div>
        <div class="card-footer">
            <div class="form-group">
                <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>

    </div>

</div>