<?php

use yii\helpers\Html;
use mdm\admin\components\Helper;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\admin\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Auth Items');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-index">

    <?php Pjax::begin(['id' => 'auth-item-grid']); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
  	    'containerOptions' => ['style' => 'overflow: auto'],
    	'headerRowOptions' => ['class' => 'kartik-sheet-style'],
    	'filterRowOptions' => ['class' => 'kartik-sheet-style'],
    	'pjax' => true, 
    	'containerOptions' => ['style' => 'overflow: auto'],
    	'headerRowOptions' => ['class' => 'kartik-sheet-style'],
    	'filterRowOptions' => ['class' => 'kartik-sheet-style'],
    	'pjax' => true,
    	'toolbar' =>  [
     	         [
     	             'content' => (Helper::checkRoute('create'))?
     	                 Html::button('<i class="fas fa-plus"></i>', [
     	                     'class' => 'btn btn-success',
     	                    'title' => 'Add Auth Item',
     	                    'onclick' => 'showForm("'.Url::toRoute(['create']).'")'
     	                 ]):'',
     	             'options' => ['class' => 'btn-group mr-2']
     	         ],
     	  ],
     	 'toggleDataContainer' => ['class' => 'btn-group mr-2'],
     	   'panel' => [
     	       'type' => GridView::TYPE_PRIMARY,
     	       'heading' => $this->title,
     	   ],
     	   'persistResize' => false,
     	   'itemLabelSingle' => 'Menu',
     	   'itemLabelPlural' => 'Menus',
              'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'type',
            'description:ntext',
            'rule_name',
            'data',
            //'created_at',
            //'updated_at',

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
                              return Html::a('<span class="glyphicon glyphicon-trash" title="Delete"></span>', ['delete', 'id' => $model->name], [
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
