<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Satker */

$this->title = 'Ubah Satker: ' . $model->nama_satker;
$this->params['breadcrumbs'][] = ['label' => 'Satker', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_satker, 'url' => ['view', 'id' => $model->id_satker]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="satker-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>