<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ConfigurationWeb */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="configuration-web-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tcw_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tcw_value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
