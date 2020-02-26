<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Satker */

$this->title = 'Satker';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="satker-create">

    <?= $this->render('_form_create', [
        'models' => $models,
    ]) ?>

</div>