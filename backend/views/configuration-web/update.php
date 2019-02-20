<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ConfigurationWeb */

$this->title = Yii::t('app', 'Update Configuration Web: {name}', [
    'name' => $model->tcw_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Configuration Webs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tcw_id, 'url' => ['view', 'id' => $model->tcw_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="configuration-web-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
