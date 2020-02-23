<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Satker */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="satker-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="card-body">

    <?= $form->field($model, 'id_satker')->textInput(['class'=>'form-control','placeholder'=>'nomor']) ?>

    <?= $form->field($model, 'nama_satker')->textInput(['class'=>'form-control','placeholder'=>'nama satker']) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
