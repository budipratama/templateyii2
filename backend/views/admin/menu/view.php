<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\admin\Menu;
/* @var $this yii\web\View */
/* @var $model backend\models\admin\Menu */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="menu-view">

    <h1>View <?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           'name',
            [
                'attribute' => 'parent',
                'value' => function($model){
                    return ($model->parent!="")?Menu::findOne($model->parent)->name:$model->parent;
                }
            ],
            'route',
            'order',
            'data',
            'icon',
        ],
    ]) ?>

</div>
