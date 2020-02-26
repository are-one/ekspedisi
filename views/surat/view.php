<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Surat */

$this->title = $model->perihal;
$this->params['breadcrumbs'][] = ['label' => 'Surat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="surat-view">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <p>
                <?php if (!Yii::$app->user->isGuest) : ?>
                    <?= Html::a('Update', ['update', 'id' => $model->id_surat], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id_surat], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                <?php endif; ?>
                <?= Html::a('Data Surat', [(Yii::$app->user->isGuest) ? 'site/index' : 'index'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'perihal',
                    'penerima',
                    [
                        'attribute' => 'foto',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return '<img src="' . $model->foto . '" alt="gambar tidak ditemukan" />';
                        },
                    ],
                ],
            ]) ?>

        </div>
    </div>
</div>