<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Satker;
use yii\base\View;
use yii\web\View as Views;

/* @var $this yii\web\View */
/* @var $model app\models\SuratSearch */
/* @var $form yii\widgets\ActiveForm */

$this->registerJS('
$(function() {
    $("#id_satker").change(function() {
        $("#tekan").click();
    });
    
    $("#reset").click(function() {
        $("#id_satker option[value=0]").siblings().removeAttr("selected");
        $("#tekan").click();
    });
});', Views::POS_END);
?>


<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    'options' => [
        'data-pjax' => 1,
        'class' => 'col-lg-3 ml-auto'
    ],
]); ?>

<?= $form->field($model, 'id_satker', [
    'template' => '
    {input}
 ' .
        Html::resetButton('Reset', ['class' => 'mt-auto btn btn-sm btn-outline-success', 'id' => 'reset'])
        . '
    '
])->dropDownList(ArrayHelper::map(Satker::find()->orderBy(['id_satker' => SORT_ASC])->all(), 'id_satker', 'nama_satker'), [
    'prompt' => ['options' => ['value' => 0], 'text' => '- pilih satker -'],
    'id' => 'id_satker',
    'class' => 'col-md-8'
])->label(false) ?>
<?= Html::submitButton('Search', ['class' => 'btn btn-primary', 'hidden' => true, 'id' => 'tekan']) ?>


<?php ActiveForm::end(); ?>