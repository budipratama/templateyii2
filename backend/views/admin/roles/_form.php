<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\admin\AuthItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-form">

    <?php $form = ActiveForm::begin([
                    'id' => $model->formName(),'enableAjaxValidation'=>true,
                    'validationUrl'=>Url::toRoute(Yii::$app->controller->id.'/validation'),
                    'options' => ['enctype' => 'multipart/form-data']]);
    ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'rule_name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'type')->textInput(['class' => 'hide','value' => 1])->label(false) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'data')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php 
$js = <<<JS
        $('form#{$model->formName()}').on('beforeSubmit',function(e){
        var \$form = $(this);
        $.post(
            \$form.attr('action'),// serialize yii2 form
            \$form.serialize()
        )
        .done(function(result){
            if (result.code == 200){
                console.log(result.code)
                closeForm();
                $.pjax.reload({container:"#menu-grid",async:false});
            }
        })
        .fail(function(){
            console.log("server error");
        });
        return false;
});
JS;
$this->registerJs($js);
