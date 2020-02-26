<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\user */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

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

            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'password', ['options' => ['value' => '']])->passwordInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'password2')->passwordInput(['maxlength' => true, 'value' => $model->password])->label('Ulangi Password') ?>

            <?= $form->field($model, 'authKey')->textInput(['hidden' => true, 'maxlength' => true])->label(false) ?>

        </div>
        <div class="card-footer">
            <div class="form-group">
                <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
                <?= Html::a('Kembali', ['site/index'], ['class' => 'btn btn-danger']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>