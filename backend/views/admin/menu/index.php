<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use backend\models\admin\Menu;
use backend\models\admin\AuthItem;
use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\admin\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Menus');
$this->params['breadcrumbs'][] = $this->title;
Helper::checkRoute('create');
?>
<div class="menu-index">
    <?php Pjax::begin(['id' => 'menu-grid']); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        'filterRowOptions' => ['class' => 'kartik-sheet-style'],
        'pjax' => true,
        'toolbar' =>  [
            [
                'content' => (Helper::checkRoute('create'))?
                    Html::button('<i class="fas fa-plus"></i>', [
                        'class' => 'btn btn-success',
                        'title' => 'Add Book',
                        'onclick' => 'showForm("'.Url::toRoute(['configurationweb/menu/create']).'")'
                    ]):'',
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
        'itemLabelSingle' => 'Menu',
        'itemLabelPlural' => 'Menus',
        'columns' => [
            'name',
            [
                'attribute' => 'parent',
                'value' => function($model){
                    return ($model->parent!="")?Menu::findOne($model->parent)->name:$model->parent;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(Menu::find()->all(),'name','name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => [
                    'placeholder' => 'Parent',
                ]
            ],
            [
                'attribute' => 'route',
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(AuthItem::find()->all(),'name','name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => [
                    'placeholder' => 'Route',
                ]
            ],

            'order',
            //'data',
            'icon',

            [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Actions',
                    'template' => Helper::filterActionColumn('{view} {update} {delete}'),
                    'buttons' => [
                            'view' => function($url,$model,$key){
                                return Html::a('<span class="glyphicon glyphicon-eye-open" title="View"></span>', "#",['onclick' => "showForm('$url')"]);
                            },
                            'update' => function($url,$model,$key){
                                return Html::a('<span class="glyphicon glyphicon-pencil" title="Update"></span>', "#",['onclick' => "showForm('$url')"]);
                            },
                            'delete' => function($url,$model,$key){
                                return Html::a('<span class="glyphicon glyphicon-trash" title="Delete"></span>', ['delete', 'id' => $model->id], [
                                    'data-confirm' => "Are you sure to delete this item {$model->name}?",
                                    'data-method' => 'post',
                                ]);
                            }
                    ]
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>