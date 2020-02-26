<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Surat Ekspedisi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-index">
    <div class="card card-primary card-outline">
        <?php Pjax::begin(); ?>
        <div class="card-header">
            <p>
                <?= Html::a('<i class="fas fa-plus"></i> Surat', ['create'], ['class' => 'btn btn-primary']) ?>
            </p>

            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>


        <div class="card-body">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => false,
                'options' => ['class' => 'table-responsive'],
                'emptyText' => 'Data tidak ditemukan',
                'filterModel' => $searchModel,
                'columns' => [
                    [
                        'class' => 'yii\grid\SerialColumn',
                        'header' => 'No',
                        'headerOptions' => ['class' => 'text-center text-primary'],
                        'contentOptions' => ['class' => 'text-center']
                    ],
                    'perihal',
                    'penerima',
                    'foto',

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