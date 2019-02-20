<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ConfigurationWeb */

$this->title = Yii::t('app', 'Create Configuration Web');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Configuration Webs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="configuration-web-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
