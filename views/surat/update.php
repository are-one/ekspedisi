<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Surat */

$this->title = 'Update Surat: ' . $model->id_surat;
$this->params['breadcrumbs'][] = ['label' => 'Surats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_surat, 'url' => ['view', 'id' => $model->id_surat]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="surat-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>