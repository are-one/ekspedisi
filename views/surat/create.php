<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Surat */

$this->title = 'Surat Ekspedisi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
