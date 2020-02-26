<?php

use app\models\Satker;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Surat */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs('
                $("input:radio").click(function(){
                    $("tr").next(".collapse").hide();
                    $(this).parents("tr").next(".collapse").toggle();

                });            
                
                $(".camera").click(function(e){
                   
                    var a = $(this).next(".image-tag");
                    Webcam.set({

                        width: 480,
            
                        height: 390,
            
                        image_format: \'png\',
            
                        jpeg_quality: 90,
                        
                        force_flash :false,
            
                    });
            
                    Webcam.attach(\'#my_camera\');                   
                    $("#ambil").click(function() {
            
                        Webcam.snap(function(data_uri) {
            
                            a.val(data_uri);
                            document.getElementById("my_camera").innerHTML = \'<img src="\' + data_uri + \'"/>\';
            
                        });
                    })
                    
                    $("#cameraModal").on("hidden.bs.modal", function (e) {
                        Webcam.reset()
                      })
            
                })  
                
                  ', View::POS_END);

?>

<div class="surat-form">
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
            <?= $form->field($model, 'perihal')->textInput(['class' => 'form-control', 'placeholder' => 'Perihal']) ?>

            <?= $form->field($model, 'penerima')->textInput(['class' => 'form-control', 'placeholder' => 'Penerima']) ?>


            <?= $form->field($model, 'id_satker')->dropDownList(ArrayHelper::map(Satker::find()->all(), 'id_satker', 'nama_satker'), ['prompt' => '- Pilih Satker -'])->label('Satker') ?>



            <?= $form->field($model, 'foto', [
                'template' => '
                    {label}
                    <a class="btn btn-app bg-primary camera" data-toggle="modal" data-target="#cameraModal">
                    <i class="fas fa-camera"></i> Kamera
                </a>
                {input}
                {error}',

            ])->hiddenInput(['class' => 'image-tag']) ?>
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

<div class="modal fade" id="cameraModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kamera Aktif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div id="my_camera"></div>

                    <br />

                </div>
                <input class="btn btn-primary" type=button value="Ambil Gambar" id="ambil">

            </div>

        </div>
    </div>
</div>