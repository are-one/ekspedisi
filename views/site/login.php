<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-box">
    <div class="login-logo">
        <?= Html::a('<b>POL</b>DA', ['site/index']) ?>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Masuk untuk memulai sesi anda</p>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                ],
            ]); ?>

            <?= $form->field($model, 'username', [
                'template' => '
                <div class="input-group mb-3">
                    {input}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    {error}{hint}
                </div>
                    '
            ])->textInput(['id' => 'username', 'autofocus' => true, 'class' => 'form-control', 'placeholder' => 'Username']) ?>

            <?= $form->field($model, 'password', [
                'template' => '
                    <div class="input-group mb-3">
                    {input}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    {error}{hint}
                </div>
                    '
            ])->passwordInput(['id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password']) ?>

            <?= $form->field($model, 'rememberMe', [
                'options' => ['class' => 'icheck-primary'],
                'horizontalCssClasses' => [
                    'offset' => '',
                    'wrapper' => 'col-sm-12',
                    'label' => 'col-sm-3',
                ],
                'template' => '
                    {input}
                      <input type="checkbox" id="remember">
                      <label for="remember">
                        Remember Me
                      </label>
                   
                  
                    '
            ])->checkbox(['id' => 'remember'])->label('remember Me') ?>


            <div class="social-auth-links text-center mb-3">

                <?= Html::submitButton('Login', ['class' => 'btn btn-block btn-primary', 'name' => 'login-button']) ?>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                </div>
            </div>

            <?php ActiveForm::end(); ?>

            <!-- /.social-auth-links -->

            <p class="mb-0 text-center">
                <?= Html::a('Halaman Utama', ['site/index']) ?>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>