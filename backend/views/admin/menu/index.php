<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use kartik\grid\GridView;
//use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\admin\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Menus');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        'filterRowOptions' => ['class' => 'kartik-sheet-style'],
        'pjax' => true, // pjax is set to always true for this demo
        'toolbar' =>  [
            [
                'content' =>
                    Html::button('<i class="fas fa-plus"></i>', [
                        'class' => 'btn btn-success',
                        'title' => 'Add Book',//Yii::t('kvgrid', 'Add Book'),
                        'onclick' => 'showForm("'.Url::toRoute(['configurationweb/menu/create']).'")'
                    ]),
                'options' => ['class' => 'btn-group mr-2']
            ],
        ],
        'toggleDataContainer' => ['class' => 'btn-group mr-2'],
        // set export properties
        'export' => [
            'fontAwesome' => true
        ],

        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => $this->title,
        ],
        'persistResize' => false,
        'toggleDataOptions' => ['minCount' => 10],
//        'exportConfig' => $exportConfig,
        'itemLabelSingle' => 'book',
        'itemLabelPlural' => 'books',
        'columns' => [
            'name',
            'parent',
            'route',
            'order',
            //'data',
            'icon',

            [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Actions',
//                    'template' => Helper::filterActionColumn('{view} {update} {delete}'),
                    'buttons' => [
                            'view' => function($url,$model,$key){
                                return Html::a('<span class="glyphicon glyphicon-eye-open" title="View"></span>', "#",['onclick' => "showForm('$url')"]);
                            },
                            'update' => function($url,$model,$key){
                                return Html::a('<span class="glyphicon glyphicon-pencil" title="Update"></span>', "#",['onclick' => "showForm('$url')"]);
                            },
                            'delete' => function($url,$model,$key){
                                return Html::a('<span class="glyphicon glyphicon-trash" title="Delete"></span>', "#");
                            }
                    ]
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
