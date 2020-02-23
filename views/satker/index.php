<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $searchModel app\models\CariSatker */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Satker';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="satker-index">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <p>
                <?= Html::a('<i class="fas fa-plus"></i> Satker', ['create'], ['class' => 'btn btn-primary']) ?>
            </p>
        </div>

        <?php Pjax::begin(); ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    [
                        'class' => 'yii\grid\SerialColumn',
                        'header' => 'No',
                        'headerOptions' => ['class' => 'text-center text-primary'],
                        'contentOptions' => ['class' => 'text-center']
                    ],
                    'id_satker',
                    'nama_satker',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Aksi',
                        'headerOptions' => ['class' => 'text-center text-primary'],
                        'contentOptions' => ['class' => 'text-center']
                    ],
                ],
                'pager' => [
                    'class' => 'yii\bootstrap4\LinkPager',
                ]
            ]); ?>
        </div>
        <?php Pjax::end(); ?>
    </div>
</div>