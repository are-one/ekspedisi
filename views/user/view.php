<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\user */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            </p>
        </div>
        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    // 'id',
                    'username',
                    [
                        'attribute' => 'password',
                        'value' => function ($model) {
                            return md5($model->password);
                        },
                        'format' => 'raw'
                    ],
                    // 'authKey',
                ],
            ]) ?>
        </div>
    </div>
</div>