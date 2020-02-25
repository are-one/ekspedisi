<?php

use yii\grid\GridView;
?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => false,
                'options' => ['id' => 'tabel'],
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
                        'contentOptions' => ['class' => 'text-center'],
                        'visibleButtons' => [
                            'update' => false,
                            'delete' => false,
                        ]
                    ],
                ],
                'pager' => [
                    'class' => 'yii\bootstrap4\LinkPager',
                ]
            ]); ?>